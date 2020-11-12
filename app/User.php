<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // use Eloquent;

    public function senders()
    {
        return $this->hasOne('App\Sender');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }

    public function receivers()
    {
        return $this->hasMany('App\Receiver');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }

    public function adress()
    {
        return $this->belongsTo('App\Adress', 'adress_code', 'adr_code');
    }

    public function cards()
    {
        return $this->hasMany('App\Card');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }

    
}
