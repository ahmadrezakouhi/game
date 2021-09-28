<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    protected $fillable = [
        'user_id', 'verbal', 'verbal_time', 'new_verbal', 'new_verbal_time', 'practical', 'practical_time', 'new_practical',
        'new_practical_time'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
