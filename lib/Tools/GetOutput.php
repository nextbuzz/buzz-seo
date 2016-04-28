<?php

namespace NextBuzz\SEO\Tools;

/**
 * GetOutput
 *
 * Simple helper class which uses output buffereing to
 * suppress output and return it instead. This helper is simply here
 * to make it possible to output buffer on one line!
 *
 * Note:
 * ommitting the get method leaves the output buffer open!
 *
 * Usage:
 * $data = GetOutput::factory()->get(methodWhichOutputs('arg1', 'arg2'));
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class GetOutput
{
    public function __construct()
    {
        ob_start();
    }

    public static function factory()
    {
        return new GetOutput();
    }

    public function get()
    {
        return ob_get_clean();
    }
}
