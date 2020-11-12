<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ramburs extends Model
{
    use Notifiable;

    protected $primaryKey = 'id_ramb';
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
