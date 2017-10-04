<?php

namespace App\Transformers;

use App\Crypto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use League\Fractal\TransformerAbstract;

class CryptoTransformer extends TransformerAbstract
{
    private $dataArray;

    public function __construct()
    {
        $this->dataArray = App::make('caps');
    }

    /**
     * @param $coins
     * @param $price
     * @param $short_name
     * @return mixed
     */
    public function profit($coins, $price, $short_name){
        $profit = $coins * $short_name - $price;
        $profit = round($profit,2);
        return $profit;
    }

    /**
     * @param Crypto $crypto
     * @return array
     */

    public function transform(Crypto $crypto)
    {
        $percent_change_1h = $this->dataArray[$crypto->coin->short_name]['percent_change_1h'];
        $percent_change_24h = $this->dataArray[$crypto->coin->short_name]['percent_change_24h'];
        $percent_change_7d = $this->dataArray[$crypto->coin->short_name]['percent_change_7d'];

        $price_eur = $this->dataArray[$crypto->coin->short_name]['price_eur'];
        $price_usd = $this->dataArray[$crypto->coin->short_name]['price_usd'];
        $profit_eur = CryptoTransformer::profit($crypto->number, $crypto->purchase_price, $price_eur);
        $profit_usd = CryptoTransformer::profit($crypto->number, $crypto->purchase_price, $price_usd);

        return [
            'id' => $crypto->id,
            'user' => [
                'name' => $crypto->user->name,
                'email' => $crypto->user->email,
            ],
            'coin' => [
                'name' => $crypto->coin->name,
                'short_name' => $crypto->coin->short_name,
            ],
            'purchase_price'  => $crypto->purchase_price,
            'number'  => $crypto->number,
            'eur' => [
                'price' => $price_eur,
                'profit' => $profit_eur,
            ],
            'usd' => [
                'price' => $price_usd,
                'profit' => $profit_usd,
            ],
            'change' => [
                'hour' => $percent_change_1h,
                'day' => $percent_change_24h,
                'week' => $percent_change_7d,
            ],
        ];
    }
}
