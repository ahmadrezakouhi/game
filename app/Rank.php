<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = ['user_id','first_person','first_person_time','prev_first_person','prev_first_preson_time',
'last_person','last_person_time','prev_last_person','prev_last_person_time'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
