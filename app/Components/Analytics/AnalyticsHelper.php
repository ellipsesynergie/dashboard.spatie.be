<?php

namespace App\Components\Analytics;

use Spatie\Analytics\Analytics;
use Spatie\Analytics\AnalyticsClientFactory;

class AnalyticsHelper
{

    public static function getView($viewId)
    {
        $config = config('laravel-analytics');
        $client = AnalyticsClientFactory::createForConfig($config);
        return new Analytics($client, $viewId);
    }
}