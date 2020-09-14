<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $table = "questions";

    protected $fillable = [
        'name', 'image'
    ];

    public function options(){
        return $this->hasMany('App\Option')->orderBy('id', 'ASC');
    }
}
