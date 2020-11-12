<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class paymentBill extends Model
{
    use Notifiable;

    protected $primaryKey = 'id_paymbill';


    protected $hidden = [
        'id_paymbill', 'cnp_fk', 'adr_fk_code', 'details',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function adress()
    {
        return $this->belongsTo('App\Adress', 'adr_fk_code', 'adr_code');
    }

    public function paym()
    {
        return $this->hasMany('App\Payment', 'id_paymbill', 'bill_id');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }
}
