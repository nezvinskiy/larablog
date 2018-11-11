<?php

namespace App\Http\ViewComposers;

use App\UseCases\Statistic\StatisticService;
use Illuminate\View\View;

class StatisticComposer
{
    protected $service;

    public function __construct(StatisticService $service)
    {
        $this->service = $service;
    }

    public function compose(View $view): void
    {
        $view->with('statistics', $this->service->webBrowserStatistics());
    }
}
