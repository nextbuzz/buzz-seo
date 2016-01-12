<?php

namespace NextBuzz\SEO\Tools;

/**
 * This is a helper class to retrieve all i18n:translate items from the xml files and converts them to an
 * empty POT file.
 *
 * Note: this is just a simple convertor and does not feature all possibilities of PO/POT files. Also it
 *       has some minor issues, so be warned :)
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class CreatePot
{

    /**
     * Array with allowed extensions
     * @var array Allowable extensions to look through
     */
    private $allowExt = array(
        'xml',
        'php'
    );

    /**
     * Array with items to look for using preg_match_all
     * Note: key is preg_match, value is keys in matched string to use as content
     * @var array
     */
    private $lookFor = array(
        'xml' => array(
        ),
        'php' => array(
            '#__\(["|\'](.*?)["|\'](.*)\)#' => array(1),
            '#_e\(["|\'](.*?)["|\'](.*)\)#' => array(1),
            '#_n\(["|\'](.*)["|\'], ["|\'](.*)["|\'], (.*)\)#U' => array(1, 2), // _n()
            '#_n_noop\(["|\'](.*)["|\'], ["|\'](.*)["|\'], ["|\'](.*)["|\']\)#U' => array(1, 2), // _n_noop()
        )
    );
    private $items = array();
    private $files = array(
        'xml' => array(),
        'php' => array()
    );

    /**
     * Use DOM and XPATH instead of regular expressions on these type of documents
     */
    private $useDom = array(
        'xml'
    );

    private $stripPathInComments = array();

    private $findings = array();

    /**
     * Add a path to add all xml files in that path
     * @param type $path
     * @return \NextBuzz\L10N\CreatePot
     */
    public function addPath($path, $ext = "xml")
    {
        if (!in_array($ext, $this->allowExt)) {
            throw new \Exception("Extension {$ext} is not allowed. Allowable: " . implode($this->allowExt, ", "), 500);
        }
        foreach ($this->globRecursive($path . "*." . $ext) as $file) {
            $this->files[$ext][] = str_replace('\\', '/', $file);
        }

        return $this;
    }

    public function stripPathInComments($path)
    {
        $this->stripPathInComments[] = str_replace('\\', '/', $path);
        return $this;
    }

    // Does not support flag GLOB_BRACE
    private function globRecursive($pattern, $flags = 0)
    {
        $files = glob($pattern, $flags);
        foreach (glob(dirname($pattern) . DIRECTORY_SEPARATOR . '*', GLOB_ONLYDIR | GLOB_NOSORT) as $dir) {
            $files = array_merge($files, $this->globRecursive($dir . '/' . basename($pattern), $flags));
        }

        return $files;
    }

    /**
     * Parse all found files for i18n:translate strings
     * Note: Yup this is very nasty stupid code
     *
     * @return \NextBuzz\L10N\CreatePot
     */
    public function parse()
    {
        $findings = array();
        foreach ($this->files as $ext => $files) {
            foreach ($files as $file) {
                $content = file_get_contents($file);
                if (in_array($ext, $this->useDom)) {
                    // Use DomDocument
                    libxml_use_internal_errors(true);
                    $dom = new \DOMDocument();
                    $dom->loadHTML($content);
                    $xpath = new \DOMXPath($dom);
                    $result = $xpath->query("//*[@*[local-name()='i18n:translate']]");
                    $commentFile = str_replace($this->stripPathInComments, "", $file);
                    foreach ($result as $node) {
                        $translatable = $this->getNodeInnerData($node);
                        if (!array_key_exists($translatable, $this->findings)) {
                            $this->findings[$translatable] = array();
                        }

                        // Find linenumber
                        $this->findings[$translatable][$node->getLineNo()] = $commentFile;
                    }

                } else {
                    // Use regular exppressions
                    $contentLines = explode("\n", $content);
                    foreach ($this->lookFor[$ext] as $search => $matchIndexes) {
                        preg_match_all($search, $content, $matches);
                        if (isset($matches[0][0])) {
                            foreach ($matchIndexes as $index) {
                                foreach ($matches[$index] as $translatable) {
                                    if (!array_key_exists($translatable, $this->findings)) {
                                        $this->findings[$translatable] = array();
                                    }

                                    // Get linenumber
                                    $commentFile = str_replace($this->stripPathInComments, "", $file);
                                    $matchLines = preg_grep($search, $contentLines);
                                    foreach (array_keys($matchLines) as $lineNumber) {
                                        if (substr_count($matchLines[$lineNumber], $translatable) > 0) {
                                            $this->findings[$translatable][($lineNumber+1)] = $commentFile;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $this;
    }

    /**
     * Recursive loop through all child nodes to retrieve all content
     * @param \DOMElement $node
     */
    private function getNodeInnerData($node)
    {
        $dom = new \DOMDocument();
        $dom->appendChild($dom->importNode($node, true));

        // Remove the 'outer node' with regular expressions
        $result = trim($dom->saveHTML());
        $preg = array (
            '#<' . $node->nodeName . '(.*?)>#',
            '#</' . $node->nodeName . '(.*?)>#'
        );
        $result = preg_replace($preg, '', $result);

        return $result;
    }

    /**
     * Write an empty POT file containing all strings found
     * @param type $file File to write to
     * @param boolean $useParentThemeName If set to false, uses the child theme name and version
     */
    public function writePot($file, $useParentThemeName = true)
    {
        $output =
            "# Copyright (C) " . date("Y") . " Next Buzz BV" . PHP_EOL .
            "msgid \"\"" . PHP_EOL .
            "msgstr \"\"" . PHP_EOL .
            "\"Project-Id-Version: buzz-seo\\n\"" . PHP_EOL .
            "\"POT-Creation-Date: " . gmdate( 'Y-m-d H:i:s+0000' ). "\\n\"" . PHP_EOL .
            "\"MIME-Version: 1.0\\n\"" . PHP_EOL .
            "\"Content-Type: text/plain; charset=UTF-8\\n\"" . PHP_EOL .
            "\"Content-Transfer-Encoding: 8bit\\n\"" . PHP_EOL .
            "\"PO-Revision-Date: ". gmdate( 'Y-m-d H:i:s+0000' ) ."\\n\"" . PHP_EOL .
            "\"Language-Team: Next Buzz <info@nextbuzz.nl>\\n\"" . PHP_EOL . PHP_EOL;

        require_once ABSPATH . '/wp-includes/pomo/po.php';
        $Po = new \PO();

        foreach ($this->findings as $translatable => $locations) {
            $output .= "#:";
            foreach ($locations as $line => $location) {
                $output .= " " . $location . ":" . $line;
            }

            $output .=
                PHP_EOL . "msgid " . $Po->poify($translatable) .
                PHP_EOL . "msgstr \"\"" . PHP_EOL . PHP_EOL;
        }
        file_put_contents($file, $output);
    }
}
