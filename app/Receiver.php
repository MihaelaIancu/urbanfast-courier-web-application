<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Receiver extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone',
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
        return $this->belongsTo('App\User');
    }
    public function adress()
    {
        return $this->belongsTo('App\Adress', 'adr_fk_code', 'adr_code');
    }

}
