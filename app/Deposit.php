<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Deposit extends Model
{
    use Notifiable;

    protected $primaryKey = 'id_deposit';


    protected $hidden = [
        'id_deposit', 'adress', 'id_for',
    ];

    public function foremen()
    {
        return $this->belongsTo('App\depositForeman', 'id_for', 'id_foreman');
    }
}
