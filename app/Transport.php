<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use Notifiable;

    protected $primaryKey = 'id_transp';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id_transp', 'details', 'type', 'vehicle'
    ];


    public function couriers()
    {
        return $this->belongsTo('App\Courier', 'driver', 'id_courier');
    }

    public function foremen()
    {
        return $this->belongsTo('App\depositForeman', 'id_for', 'id_foreman');
    }
}
