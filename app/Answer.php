<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $table = "answers";

    protected $fillable = [
        'user_id', 'question_id', 'option_id'
    ];
    
    public function question() {
        return $this->belongsTo('App\Question');
    }

    public function option() {
        return $this->belongsTo('App\Option');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
