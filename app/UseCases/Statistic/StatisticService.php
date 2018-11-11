<?php
namespace App\UseCases\Statistic;

use Illuminate\Support\Facades\DB;
use App\Entity\Statistic\Statistic;
use Illuminate\Http\Request;

class StatisticService
{
    public function add(Request $request): void
    {
        if (!$request->session()->has('visitor')) {

            $browser = get_browser(null, true);

            $stat = Statistic::make([
                'ip_address' => $request->ip(),
                'web_browser' => $browser['browser'] ?? 'Not defined',
            ]);
            $stat->saveOrFail();

            $request->session()->put('visitor', true);
        }
    }

    public function webBrowserStatistics(): array
    {
        $statistics = Statistic::select('web_browser', DB::raw('count(*) as total'))
            ->orderBy('web_browser', 'asc')
            ->groupBy('web_browser')
            ->get()
            ->toArray();

        return $statistics ?? [];
    }
}
