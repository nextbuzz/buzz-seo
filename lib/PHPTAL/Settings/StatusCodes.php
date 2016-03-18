<?php

namespace NextBuzz\SEO\PHPTAL\Settings;

/**
 * XML Sitemaps admin interface handler.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class StatusCodes extends \NextBuzz\SEO\PHPTAL\SettingsPage
{

    public function __construct($tplName)
    {
        parent::__construct('SettingsStatusCodes');

        $table404 = new \NextBuzz\SEO\Tables\Table404();
        $table404->prepare_items();

        $table301 = new \NextBuzz\SEO\Tables\Table301();
        $table301->prepare_items();

        $this->setTalData(array(
            'table404' => $table404->get_display(),
            'table301' => $table301->get_display(),
        ));
    }
}
