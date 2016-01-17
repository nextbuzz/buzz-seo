<?php

namespace NextBuzz\SEO\PHPTAL;

/**
 * Create sitemap xml output using TAL
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class XML extends Template
{

    /**
     * Constructor
     * @param string $tplName The name of the Template file (without .xml)
     */
    public function __construct($tplName)
    {
        parent::__construct($tplName);
        
        // Render as XML
        $this->setOutputMode(\PHPTAL::XML);

        // Strip comments
        $this->stripComments(false);
    }

    public static function factory($tplName = false)
    {
        return new static($tplName);
    }

    public function render()
    {
        $this->echoExecute();
    }
}
