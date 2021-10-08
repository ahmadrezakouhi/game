<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','last_name','user_type','gender','can_play','time','letter','condition','resolution','exit',
        'enter','letter_time','enter_time'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function ranks(){
        return $this->hasMany(Rank::class);
    }


    public function money(){
        return $this->hasMany(Money::class);
    }


    public function questions()
    {
        return $this->hasMany(Question::class);
    }



    public function estimate()
    {
        return $this->hasOne(Estimate::class);
    }

    


}
