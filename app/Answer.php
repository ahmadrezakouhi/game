<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable =['user_id','result','prev_result','time','prev_time','category'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
