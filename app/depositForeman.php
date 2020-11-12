<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class depositForeman extends Model
{
    use Notifiable;

    protected $primaryKey = 'id_foreman';
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

    public function deposits()
    {
        return $this->hasOne('App\Deposit');
    }

    public function transports()
    {
        return $this->hasMany('App\Transport', 'id_foreman', 'id_for');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }
}
