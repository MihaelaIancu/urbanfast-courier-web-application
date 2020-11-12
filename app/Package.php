<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Package extends Model
{
    use Notifiable;

    protected $primaryKey = 'pack_code';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'height', 'width', 'length', 'weigth_kg', 'content', 'details', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pack_code', 'cnp_fk', 'id_meth', 'id_fk_deposit', 'id_fk_transp', 'remember_token',
    ];

    // use Eloquent;

    // public function senders()
    // {
    //     return $this->hasMany('App\Sender');
    //     // return $this->hasMany('App\Comment', 'foreign_key');
    // }

    // public function receivers()
    // {
    //     return $this->hasMany('App\Receiver');
    //     // return $this->hasMany('App\Comment', 'foreign_key');
    // }

    public function sender()
    {
        return $this->belongsTo('App\User', 'user_cnp', 'cnp');
    }
}
