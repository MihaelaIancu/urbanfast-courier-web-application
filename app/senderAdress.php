<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class senderAdress extends Model
{
    use Notifiable;

    protected $primaryKey = 'sender_code';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'sender_code', 'adress_code',
    ];

    public function adress()
    {
        return $this->belongsTo('App\Adress', 'adress_code', 'adr_code');
    }

    public function senders()
    {
        return $this->hasMany('App\Sender', 'sender_code', 'adr_fk_code');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }
}
