<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NextBuzz\SEO\Upgrades;

/**
 * Upgrade class for version 1.11.3
 *
 * There was an error in the upgrade class of 1.11.1 which crashed if certain roles were not available, so
 * we make sure we re-set the same values (with the added if statements) again.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class Upgrade0113 implements Interfaces\Upgrade
{

    public function getVersion()
    {
        return '0.11.3';
    }

    public function runUpgrade()
    {
        // Doing the upgrade
        // Add custom capability
        add_action('init', array($this, 'addCapability'));
    }

    public function addCapability() {
        $role = get_role('author');
        if ($role) {
            // Add author seo analysis
            $role->add_cap('buzz_seo_analysis');
            $role->add_cap('buzz_seo_optimize');
        }

        $role = get_role('editor');
        if ($role) {
            // Add editor settings rights
            $role->add_cap('buzz_seo_settings');
            $role->add_cap('buzz_seo_settings_ga');
            $role->add_cap('buzz_seo_settings_cleanup');
            $role->add_cap('buzz_seo_settings_structured');
            $role->add_cap('buzz_seo_settings_sitemaps');
            // Add editor seo analysis
            $role->add_cap('buzz_seo_analysis');
            $role->add_cap('buzz_seo_optimize');
        }
        $role = get_role('administrator');
        if ($role) {
            // Add administrator settings rights
            $role->add_cap('buzz_seo_settings');
            $role->add_cap('buzz_seo_settings_ga');
            $role->add_cap('buzz_seo_settings_cleanup');
            $role->add_cap('buzz_seo_settings_structured');
            $role->add_cap('buzz_seo_settings_sitemaps');
            $role->add_cap('buzz_seo_settings_setup');
            // Add administrator seo analysis
            $role->add_cap('buzz_seo_analysis');
            $role->add_cap('buzz_seo_optimize');
        }
    }
}
