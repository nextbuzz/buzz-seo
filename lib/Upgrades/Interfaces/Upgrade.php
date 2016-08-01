<?php

namespace NextBuzz\SEO\Upgrades\Interfaces;

/**
 * All upgrade classes should implement this interface.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
interface Upgrade
{
    /**
     * Return a string with the plugin version number for the upgrade.
     *
     * If the current plugin version is smaller than the version returned by this method, the runUpgrade method is
     * called.
     */
    public function getVersion();

    /**
     * This method is called only when the version is out of date.
     */
    public function runUpgrade();
}
