<?php

namespace NextBuzz\SEO\PHPTAL\Settings;

/**
 * BuzzSEO
 *
 * @author HeroBanana, Nick Vlug <nick@ruddy.nl>
 */
class General extends \NextBuzz\SEO\PHPTAL\SettingsPage
{
    public function __construct()
    {
        parent::__construct('SettingsGeneral');

        $availableSeps = array(
            array('item' => '-'),
            array('item' => '—'),
            array('item' => '·'),
            array('item' => '•'),
            array('item' => '*'),
            array('item' => '⋆'),
            array('item' => '|'),
            array('item' => '~'),
            array('item' => '«'),
            array('item' => '»'),
            array('item' => '<'),
            array('item' => '>'),
        );

        foreach($availableSeps as &$sep) {
            $sep['selected'] = ($sep['item'] === $this->options['titleseparator']);
        }

        $this->setTalData('availableSeps', $availableSeps);
    }
}
