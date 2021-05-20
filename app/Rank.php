<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = ['user_id','first_person','last_person','time'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
