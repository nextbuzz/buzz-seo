<?php

/*
 * © Copyright NextBuzz B.V.
 */

namespace NextBuzz\SEO\Features;

/**
 * Description of Admin
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class Admin extends BaseFeature
{

    public function init()
    {
        if (!is_admin()) {
            return;
        }
        
        add_action('admin_enqueue_scripts', array($this, 'enqueueAdminScripts'));
    }

    public function allowDisable()
    {
        return false;
    }

    /**
     * Enqueue admin scripts and styles
     */
    public function enqueueAdminScripts()
    {
        wp_enqueue_style('buzz-seo-admin', plugins_url('buzz-seo/css/admin.css'), false, BUZZSEO_VERSION);
        wp_enqueue_script('buzz-seo-admin-js', plugins_url('buzz-seo/js/admin.js'), array('jquery'), BUZZSEO_VERSION);
    }
}
