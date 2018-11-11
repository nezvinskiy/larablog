<?php

namespace App\Providers;

use App\Http\ViewComposers\StatisticComposer;
use App\Http\ViewComposers\CategoryComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('layouts.app', StatisticComposer::class);
        View::composer('layouts.app', CategoryComposer::class);
    }
}
