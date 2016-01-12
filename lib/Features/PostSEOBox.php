<?php

namespace NextBuzz\SEO\Features;

/**
 * Option page administration feature
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class PostSEOBox extends BaseFeature
{
    public function name()
    {
        return "SEO Box";
    }

    public function desc()
    {
        return "add add an optimization SEO box for each post";
    }

    public function init()
    {
        if (!is_admin()) {
            return;
        }

        add_action('admin_init', array($this, 'initBack'));
    }

    public function allowDisable()
    {
        return false;
    }

    /**
     * Initialize everything that is only needed in backend
     *
     * @return void
     */
    public function initBack()
    {
        // Load SEO box for all Single pages
        new \NextBuzz\SEO\PHPTAL\MetaBox('PostSEOBox', __('Search Engine Optimization (SEO)', 'buzz-seo'));
    }

}
