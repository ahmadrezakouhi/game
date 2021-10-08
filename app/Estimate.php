<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $fillable = ['user_id','best_estimate','best_estimate_time','new_best_estimate','new_best_'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
