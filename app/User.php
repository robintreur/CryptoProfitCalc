<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cryptos()
    {
        return $this->hasMany('App\Crypto');
    }

    /**
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }

    /**
     * @return mixed
     */
    public function isActive()
    {
        return $this->active;
    }
}
