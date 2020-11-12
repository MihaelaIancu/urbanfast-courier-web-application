<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class paymentMeth extends Model
{
    use Notifiable;

    protected $primaryKey = 'id';

    protected $fillable = [
        'method', 
    ];

    protected $hidden = [
        'id', 'cnp_fk', 'id_ramb_fk',
    ];

    public function ramburs()
    {
        return $this->belongsTo('App\Ramburs', 'id_ramb_fk', 'id_ramb');
    }

    public function sender()
    {
        return $this->belongsTo('App\Sender', 'cnp_fk', 'cnp');
    }


    // public function deposits()
    // {
    //     return $this->hasOne('App\Deposit');
    // }
}
