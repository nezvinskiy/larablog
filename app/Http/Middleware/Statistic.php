<?php

namespace App\Http\Middleware;

use Closure;
use App\Entity\Statistic\Statistic as ModelStatistic;

class Statistic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('visitor')) {

            $browser = get_browser(null, true);

            $stat = ModelStatistic::make([
                'ip_address' => $request->ip(),
                'web_browser' => $browser['browser'] ?? 'Not defined',
            ]);
            $stat->saveOrFail();

        } else {
            $request->session()->put('visitor', true);
        }

        return $next($request);
    }
}
