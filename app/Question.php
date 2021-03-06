<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['user_id','result','time','category'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
