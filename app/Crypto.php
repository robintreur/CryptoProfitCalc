<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function coin(){
        return $this->belongsTo('App\Coin');
    }

    protected $guarded =  ['id'];
}
