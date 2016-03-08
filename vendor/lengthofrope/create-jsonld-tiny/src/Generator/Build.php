<?php

/*
 * The MIT License
 *
 * Copyright 2016 LengthOfRope, Bas de Kort <bdekort@gmail.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace LengthOfRope\JSONLD\Generator;

/**
 * Fetch the data and build all classes
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class Build
{

    const RDFA_SCHEMA = 'http://schema.org/docs/schema_org_rdfa.html';

    /**
     * Holds the schema.org data
     * @var string
     */
    private $schema;
    private $types = array();
    private $props = array();
    private $tinyItems = array();

    /**
     * Factory
     * @param array $tinyItems Array with classes we want.
     * @return \LengthOfRope\JSONLD\Generator\Build
     */
    public static function factory($tinyItems)
    {
        return new Build($tinyItems);
    }

    private function __construct($tinyItems)
    {
        set_time_limit(0);

        $this->tinyItems = $tinyItems;

        $this->getJSONVersionOfSchema();

        $this->parse();

        $this->write();
    }

    /**
     * Retrieve the latest RDFA version of schema.org and converts it to JSON-LD.
     *
     * Note: caches the file in data and retrieves it from there as long as it exists.
     */
    private function getJSONVersionOfSchema()
    {
        // Set cachefile
        $cacheFile = dirname(dirname(__DIR__)) . '/data/schemaorg.cache';

        if (!file_exists($cacheFile)) {
            // Create dir
            if (!file_exists(dirname($cacheFile))) {
                mkdir(dirname($cacheFile), 0777, true);
            }

            // Load RDFA Schema
            $graph = new \EasyRdf_Graph(self::RDFA_SCHEMA);
            $graph->load(self::RDFA_SCHEMA, 'rdfa');

            // Lookup the output format
            $format = \EasyRdf_Format::getFormat('jsonld');

            // Serialise to the new output format
            $output = $graph->serialise($format);

            if (!is_scalar($output)) {
                $output = var_export($output, true);
            }

            $this->schema = \ML\JsonLD\JsonLD::compact($graph->serialise($format), 'http://schema.org/');

            // Write cache file
            file_put_contents($cacheFile, serialize($this->schema));
        } else {
            $this->schema = unserialize(file_get_contents($cacheFile));
        }
    }

    private function parse()
    {
        foreach ($this->schema->{'@graph'} as $key => $item)
        {
            $types = $item->type;
            if ($types !== 'rdf:Property') {
                // Skip all but properties
                continue;
            }

            // Convert domain and range to arrays
            $domains = array();
            if (!is_array($item->domainIncludes)) {
                $item->domainIncludes = array($item->domainIncludes);
            }

            foreach ($item->domainIncludes as $dom)
            {
                if (!in_array($dom->id, $domains)) {
                    $domains[] = $dom->id;
                }
            }

            $item->domainIncludes = $domains;


            $range = array();
            if (!is_array($item->rangeIncludes)) {
                $item->rangeIncludes = array($item->rangeIncludes);
            }

            foreach ($item->rangeIncludes as $ran)
            {
                $range[] = array(
                    'id' => $ran->id,
                    'class' => str_replace('schema:', '', $ran->id) . 'Schema'
                );
            }

            $item->rangeIncludes = $range;

            $this->props[$item->id] = $item;
        }


        foreach ($this->schema->{'@graph'} as $key => $item)
        {
            $types = $item->type;
            if ($types === 'rdf:Property') {
                // Skip properties in first run
                continue;
            }

            $item->props = array();

            // Add properties to item
            foreach ($this->props as $prop)
            {
                if (in_array($item->id, $prop->domainIncludes)) {
                    if (!isset($item->props[$prop->{'rdfs:label'}])) {
                        $item->props[$prop->{'rdfs:label'}] = array(
                            'id' => $prop->id,
                            'domainIncludes' => $prop->domainIncludes,
                            'rangeIncludes' => $prop->rangeIncludes,
                            'comment' => $prop->{'rdfs:comment'},
                            'label' => $prop->{'rdfs:label'},
                            'getter' => 'get' . ucfirst($prop->{'rdfs:label'}),
                            'setter' => 'set' . ucfirst($prop->{'rdfs:label'}),
                        );
                    }
                }
            }

            if (is_array($types)) {
                foreach ($types as $type)
                {
                    $this->types[$type][$item->id] = $item;
                }
            } else if (!empty($types)) {
                $this->types[$types][$item->id] = $item;
            }
        }
    }

    private function write()
    {
        $dir = dirname(__DIR__) . '/Schema/';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $loader = new \Twig_Loader_Filesystem(dirname(dirname(__DIR__)) . '/tools/');
        $twig = new \Twig_Environment($loader);

        // Make sure we add all classes we extend to
        do {
            $newExtendAdded = false;
            foreach ($this->types['rdfs:Class'] as $item)
            {
                // Add Schema to all classes to prevent failures (classes Class or Float) are reserved.
                if (!in_array($item->{'rdfs:label'}, $this->tinyItems)) {
                    continue;
                }

                if (in_array($class, array('DataTypeSchema'))) {
                    continue;
                }

                $classextends = @$item->{'rdfs:subClassOf'};
                $classextends = @str_replace('schema:', '', $classextends->id);
                if (!empty($classextends)) {
                    if (!in_array($classextends, $this->tinyItems)) {
                        array_push($this->tinyItems, $classextends);
                        $newExtendAdded = true;
                    }
                }

                // Also check properties
                if (is_array($item->props)) {
                    foreach ($item->props as $prop)
                    {
                        if (is_array($prop['rangeIncludes'])) {
                            foreach ($prop['rangeIncludes'] as $checkClass)
                            {
                                // Strip 'Schema' from classname
                                $class = substr($checkClass['class'], 0, -6);
                                if (!in_array($class, $this->tinyItems)) {
                                    array_push($this->tinyItems, $class);
                                    $newExtendAdded = true;
                                }
                            }
                        }
                    }
                }
            }
        } while ($newExtendAdded);

        foreach ($this->types['rdfs:Class'] as $item)
        {
            // Add Schema to all classes to prevent failures (classes Class or Float) are reserved.
            if (!in_array($item->{'rdfs:label'}, $this->tinyItems)) {
                continue;
            }

            $class = $item->{'rdfs:label'} . 'Schema';

            if (in_array($class, array('DataTypeSchema'))) {
                continue;
            }

            $classextends = @$item->{'rdfs:subClassOf'};
            $classextends = @str_replace('schema:', '', $classextends->id);
            if (empty($classextends)) {
                $classextends = '\LengthOfRope\JSONLD\Elements\Element';
            } else {
                $classextends .= 'Schema';
            }
            $file = $dir . $class . '.php';

            $context = @explode(":", $item->id);
            $context = @$this->schema->{'@context'}->$context[0];

            $content = $twig->render('template.twig', array(
                'class' => $class,
                'classcomment' => $item->{'rdfs:comment'},
                'classExtends' => $classextends,
                'properties' => $item->props,
                'context' => $context,
                'type' => $item->{'rdfs:label'},
            ));


            file_put_contents($file, $content);
        }
    }

}
