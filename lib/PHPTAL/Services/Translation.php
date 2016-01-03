<?php

namespace LengthOfRope\PHPTAL\Services;

/**
 * Description of Translation
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class Translation implements \PHPTAL_TranslationService
{
    private $domain = 'default';

    public function setEncoding($encoding)
    {
        // Ignore, we simply must use UTF-8 for everything
    }

    public function setLanguage()
    {
        throw new \Exception("Use WordPress Translate Core to set Language!", 500);
    }

    public function setVar($key, $value_escaped)
    {
        throw new \Exception("Use WordPress Translate Core to set vars!", 500);
    }

    public function translate($key, $htmlescape = true)
    {
        return __($key, $this->domain);
    }

    public function useDomain($domain)
    {
        load_textdomain($domain, LORSEO_DIR . DIRECTORY_SEPARATOR . 'languages' . DIRECTORY_SEPARATOR);
        $this->domain = $domain;
    }
}
