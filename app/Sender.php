<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sender extends Model
{
    use Notifiable;

    protected $primaryKey = 'cnp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','cnp', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_fk_id', 'adr_fk_code',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_fk_id', 'user_id');
    }
    public function adress()
    {
        return $this->belongsTo('App\senderAdress', 'adr_fk_code', 'sender_code');
    }
    public function packages()
    {
        return $this->hasMany('App\Package', 'cnp', 'cnp_fk');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }
    public function methods()
    {
        return $this->hasMany('App\payMeth', 'cnp', 'cnp_fk');
    }
}
