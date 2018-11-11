<?php

namespace App\Http\Middleware;

use Closure;
use App\UseCases\Statistic\StatisticService;

class Statistic
{
    protected $service;

    public function __construct(StatisticService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->service->add($request);

        return $next($request);
    }
}
