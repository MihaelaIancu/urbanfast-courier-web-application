<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payment extends Model
{
    use Notifiable;

    protected $primaryKey = 'id_paym';

    protected $fillable = [
        'sum_payment', 'ramburs',
    ];

    protected $hidden = [
        'id_paymb', 'bill_id', 'id_meth', 
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function bills()
    {
        return $this->belongsTo('App\paymentBill', 'bill_id', 'id_paymbill');
    }
    public function methods()
    {
        return $this->belongsTo('App\payMeth', 'method_id', 'id');
    }
}
