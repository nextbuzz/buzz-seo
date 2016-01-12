<?php

namespace NextBuzz\SEO\Features;

/**
 * Option page administration feature
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class AdminOptionPage extends BaseFeature
{
    public function init()
    {
        
    }

    /**
     * Do not allow disabling this feature
     */
    public function allowDisable()
    {
        return false;
    }
}
