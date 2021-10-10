<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['user_id','best_score','best_score_time','new_best_score','new_best_score_time'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
