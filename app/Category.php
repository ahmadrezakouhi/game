<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function category_answers(){
        return $this->hasMany(CategoryAnswer::class);
    }



}
