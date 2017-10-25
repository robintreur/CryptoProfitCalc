<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Support\Facades\Cache;

class GetCoinMarketCapApi
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
        $capsData = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?limit=600&convert=EUR');
        $capsData = json_decode($capsData, true);

        // new blade friendly array
        foreach ($capsData as $capData) {
            $dataArray[$capData['symbol']] = $capData;
        }

        Cache::put('caps', $dataArray, 1);
        return $next($request);
    }
}
