<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    // protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'card_number', 'name', 'card_exp_month', 'card_exp_year', 'card_cvc',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'user_fk_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
