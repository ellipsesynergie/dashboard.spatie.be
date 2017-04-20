<?php

namespace App\Events\Analytics;

use App\Events\DashboardEvent;

class AnalyticsFetched extends DashboardEvent
{
    /** @var int */
    public $viewId;

    /** @var array */
    public $analytics;

    public function __construct($viewId, array $analytics)
    {
        $this->viewId = $viewId;
        $this->analytics = $analytics;
    }

    public function broadcastAs()
    {
        return get_class() . '\\' . $this->viewId;
    }
}
