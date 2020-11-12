<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class paymentAdress extends Model
{
    use Notifiable;

    protected $primaryKey = 'payment_code';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'payment_code', 'adress_code',
    ];

    public function adress()
    {
        return $this->belongsTo('App\Adress', 'adress_code', 'adr_code');
    }
    public function pay_bills()
    {
        return $this->hasMany('App\paymentBill', 'payment_code', 'adr_fk_code');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }

    // public function senders()
    // {
    //     return $this->hasMany('App\Sender', 'receiver_code', 'adr_fk_code');
    //     // return $this->hasMany('App\Comment', 'foreign_key');
    // }
}
