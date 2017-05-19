<?php

namespace App\Components\Analytics;

use App\Events\Analytics\AnalyticsFetched;
use Illuminate\Console\Command;
use Spatie\Analytics\Period;

/**
 * Class FetchGoogleAnalytics
 * @package App\Components\Analytics
 */
class FetchGoogleAnalytics extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'dashboard:google-analytics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Google Analytics events.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $viewIds = explode(',', config('laravel-analytics.view_id'));

        foreach ($viewIds as $viewId) {
            $totalVisits = AnalyticsHelper::getView($viewId)->fetchTotalVisitorsAndPageViews(Period::days(config('laravel-analytics.number_of_days', 7)));

            $days = [];
            $visitors = [];
            $pageViews = [];

            foreach ($totalVisits as $day) {
                $days[] = $day['date']->format('m-d');
                $visitors[] =  $day['visitors'];
                $pageViews[] = $day['pageViews'];
            }

            event(new AnalyticsFetched($viewId, compact('days', 'visitors', 'pageViews')));
        }
    }
}
