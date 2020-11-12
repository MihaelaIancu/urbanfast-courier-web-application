<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    
        use Notifiable;

        protected $primaryKey = 'admin_id';
        protected $guard = 'admin';

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        public function jobs()
        {
            return $this->belongsTo('App\job', 'job_code', 'job_id');
        }

        public function couriers()
    {
        return $this->hasMany('App\Courier', 'admin_id', 'id_admin');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }

    public function managers()
    {
        return $this->hasMany('App\Manager', 'admin_id', 'id_admin');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }

    public function foremen()
    {
        return $this->hasMany('App\depositForeman', 'admin_id', 'id_admin');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }

    public function ramburs()
    {
        return $this->hasMany('App\Ramburs', 'admin_id', 'id_admin');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }
}
