<?php

namespace App\Events\Analytics;

use App\Events\DashboardEvent;

/**
 * Class AnalyticsFetched
 * @package App\Events\Analytics
 */
class AnalyticsFetched extends DashboardEvent
{
    /**
     * @var int
     */
    public $viewId;

    /**
     * @var array
     */
    public $analytics;

    /**
     * AnalyticsFetched constructor.
     * @param $viewId
     * @param array $analytics
     */
    public function __construct($viewId, array $analytics)
    {
        $this->viewId = $viewId;
        $this->analytics = $analytics;
    }

    /**
     * Indicate the name of the current event
     * @return string
     */
    public function broadcastAs()
    {
        return get_class() . '\\' . $this->viewId;
    }
}
