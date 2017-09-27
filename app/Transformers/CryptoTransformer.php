<?php

namespace App\Transformers;

use App\Crypto;
use App\Http\Controllers\CryptoController;
use League\Fractal\TransformerAbstract;
use Illuminate\Database\Eloquent\Collection;

class CryptoTransformer extends TransformerAbstract
{

    /**
     * @param $coins
     * @param $price
     * @param $short_name
     * @return mixed
     */
    public function profit($coins, $price, $short_name){
        $profit = $coins * $short_name - $price;
        return $profit;
    }

    /**
     * @param Crypto $crypto
     * @return array
     */

    public function transform(Crypto $crypto)
    {
        $capsData = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?limit=600&convert=EUR');
        $capsData = json_decode($capsData, true);

        // new blade friendly array
        foreach ($capsData as $capData) {
            $dataArray[$capData['symbol']] = $capData;
        }
        $price_eur = $dataArray[$crypto->coin->short_name]['price_eur'];
        $price_usd = $dataArray[$crypto->coin->short_name]['price_usd'];
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
        ];
    }
}
