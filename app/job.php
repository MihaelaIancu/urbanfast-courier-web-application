<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class job extends Model
{
    use Notifiable;

    protected $primaryKey = 'job_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'job_id', 'name',
    ];


    public function admins()
    {
        return $this->hasMany('App\Admin', 'job_id', 'job_code');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }
}
