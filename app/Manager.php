<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Manager extends Model
{
    use Notifiable;

    protected $primaryKey = 'id_courier';
    protected $fillable = [
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admins()
    {
        return $this->belongsTo('App\Admin', 'id_admin', 'admin_id');
    }
}
