<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\Relations;

class Adress extends Model
{
    use Notifiable;

    protected $primaryKey = 'adr_code';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adress', 'zip_code', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'adr_code',
    ];

    // use Eloquent;


    public function users()
    {
        return $this->hasMany('App\User', 'adr_code', 'adress_code');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }

    public function send_adrs()
    {
        return $this->hasMany('App\senderAdress', 'adr_code', 'adress_code');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }

    public function receivers()
    {
        return $this->hasMany('App\Receiver', 'adr_code', 'adr_fk_code');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }

    public function paym_bills()
    {
        return $this->hasMany('App\paymentBill', 'adr_code', 'adr_fk_code');
        // return $this->hasMany('App\Comment', 'foreign_key');
    }
}
