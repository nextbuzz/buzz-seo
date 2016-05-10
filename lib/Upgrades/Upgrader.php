<?php

namespace NextBuzz\SEO\Upgrades;

/**
 * A simple upgrader class which only runs upgrades when needed
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class Upgrader
{

    /**
     * Adds an upgrade check when plugins are loaded.
     */
    public function __construct()
    {
        add_action('plugins_loaded', array($this, 'checkUpgrades'));
    }

    /**
     * A factory method to allow chaining.
     *
     * @return \NextBuzz\SEO\Upgrades\Upgrader
     */
    public static function factory()
    {
        return new Upgrader();
    }

    /**
     * Check if we should run an upgrade.
     *
     * @access private
     */
    public function checkUpgrades()
    {
        $currentUpgradeVersion = get_option('buzzSEOUpgrader', '0.0.1');

        if (version_compare($currentUpgradeVersion, BUZZSEO_VERSION) > -1) {
            // Bail early
            return;
        }

        // Array holding all upgrades that should be performed in order of version
        $upgradesToRun = array();

        $files = glob(__DIR__ . '/*.php');
        foreach ($files as $file) {
            $class      = '\NextBuzz\\SEO\\Upgrades\\' . str_replace(array(__DIR__ . '/', '.php'), '', $file);
            $implements = class_implements($class);
            if (in_array('NextBuzz\SEO\Upgrades\Interfaces\Upgrade', $implements)) {
                // Add the class to the upgrade list
                $upgrade        = new $class();
                $upgradeVersion = $upgrade->getVersion();

                // Only add the upgrade if needed
                if (version_compare($currentUpgradeVersion, $upgradeVersion) > -1) {
                    continue;
                }
                if (!isset($upgradesToRun[$upgradeVersion])) {
                    $upgradesToRun[$upgradeVersion] = array();
                }
                $upgradesToRun[$upgradeVersion][] = $upgrade;
            }
        }

        // Make sure all upgrades are run in order
        uksort($upgradesToRun,
            function($version1, $version2) {
            return -1 * version_compare($version1, $version2);
        });

        // Run all upgrades
        foreach ($upgradesToRun as $versionUpgradesToRun) {
            foreach ($versionUpgradesToRun as $versionUpgrade) {
                $versionUpgrade->runUpgrade();
            }
        }
        
        // Update upgrader version
        update_option('buzzSEOUpgrader', BUZZSEO_VERSION);
    }

}
