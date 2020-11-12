<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payMeth extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'method', 
    ];

    protected $hidden = [
        'id', 'cnp_fk',
    ];

    public function ramburs()
    {
        return $this->belongsTo('App\Ramburs', 'id_ramb_fk', 'id_ramb');
    }

    public function sender()
    {
        return $this->belongsTo('App\Sender', 'cnp_fk', 'cnp');
    }
    public function payment()
    {
        return $this->hasOne('App\Payment');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }
}
