<?php

/*
 * © Copyright NextBuzz B.V.
 */

namespace NextBuzz\SEO\Tools;

/**
 * GradeDisplay is a simple class which outputs a dashicon star rating value between 0 and 10.
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class GradeDisplay
{
    private $grade;

    /**
     * Grade Display
     * @param int $grade A value between 0 and 10
     */
    public function __construct($grade = 0)
    {
        $this->grade = intval($grade);
        if ($this->grade < 0) {
            $this->grade = 0;
        }
        if ($this->grade > 10) {
            $this->grade = 10;
        }
    }

    /**
     * Grade Display factory
     *
     * @param int $grade A value between 0 and 10
     * @return \NextBuzz\SEO\Tools\GradeDisplay
     */
    public static function factory($grade = 0)
    {
        return new GradeDisplay($grade);
    }

    /**
     * Return the output
     * @return string A string with the output
     */
    public function get()
    {
        $grade = $this->grade / 2;
        $output = '';
        for ($number = 1; $number <= 5; $number++) {
            $class = 'dashicons-star-empty';
            if ($grade >= $number) {
                $class = 'dashicons-star-filled';
            } elseif (ceil($grade) >= $number) {
                $class = 'dashicons-star-half';
            }
            $output .= '<span class="dashicons ' . $class .'"></span>';
        }

        return $output;
    }

    /**
     * Display the output
     */
    public function output() {
        echo $this->get();
    }
}
