<?php

namespace App\Components\Analytics;

use Spatie\Analytics\Analytics;
use Spatie\Analytics\AnalyticsClientFactory;

/**
 * Class AnalyticsHelper
 * @package App\Components\Analytics
 */
class AnalyticsHelper
{

    /**
     * Create an Analytics object by using a view id
     * @param $viewId
     * @return Analytics
     */
    public static function getView($viewId)
    {
        $config = config('laravel-analytics');
        $client = AnalyticsClientFactory::createForConfig($config);
        return new Analytics($client, $viewId);
    }
}