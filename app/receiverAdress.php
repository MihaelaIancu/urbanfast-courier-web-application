<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class receiverAdress extends Model
{
    use Notifiable;

    protected $primaryKey = 'receiver_code';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'receiver_code', 'adress_code',
    ];

    // public function adress()
    // {
    //     return $this->belongsTo('App\Adress', 'adress_code', 'adr_code');
    // }

    public function senders()
    {
        return $this->hasMany('App\Sender', 'receiver_code', 'adr_fk_code');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }
}
