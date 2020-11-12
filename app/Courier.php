<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Courier extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id_courier';
    protected $guard = 'courier';

        protected $fillable = [
            'username', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        // public function getAuthPassword()
        // {
        // return $this->password;
        // }

        public function admins()
        {
            return $this->belongsTo('App\Admin', 'id_admin', 'admin_id');
        }

        public function transports()
    {
        return $this->hasMany('App\Transport', 'id_courier', 'driver');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }
}
