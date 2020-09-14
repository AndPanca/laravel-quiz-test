<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $table = "options";

    protected $fillable = [
        'name', 'question_id', 'is_correct'
    ];
}
