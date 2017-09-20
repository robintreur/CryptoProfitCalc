<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    public function cryptos(){
        return $this->hasMany('App\Crypto');
    }
}
