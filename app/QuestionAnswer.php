<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected  $fillable = ['user_id','question_id','category_answer_id',];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category_answer(){
        return $this->belongsTo(CategoryAnswer::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
