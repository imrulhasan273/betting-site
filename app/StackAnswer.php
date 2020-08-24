<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StackAnswer extends Model
{
    protected $fillable = ['question_id', 'answer', 'bet_rate'];
}
