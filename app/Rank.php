<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = ['user_id','first_person','first_person_time','new_first_person','new_first_person_time',
'last_person','last_person_time','new_last_person','new_last_person_time','first_person_correct','last_person_correct'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
