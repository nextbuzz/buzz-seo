<?php

namespace NextBuzz\SEO\Features;

/**
 * Option page administration feature
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class RankMathExporter extends BaseFeature
{

    public function name()
    {
        return __("RankMath Exporter", 'buzz-seo');
    }

    public function desc()
    {
        return __("Allows Rank Math to import Buzz SEO data. NOTE: Only post terms are exported. Site settings like Sitemap need to be setup manually!", 'buzz-seo');
    }

    public function init()
    {
        add_filter('rank_math/importers/detect_plugins', [$this, 'addRankMathImporter']);
    }

    public function addRankMathImporter($items)
    {
        $items['buzz-seo'] = [
            'class' => '\\NextBuzz\\SEO\\RankMath\\RankMathExporter',
            'file' => 'buzz-seo/buzz-seo.php',
        ];
        return $items;
    }
}
