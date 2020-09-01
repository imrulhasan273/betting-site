<?php

namespace App;

use App\Question;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'answer', 'bet_rate', 'status', 'result'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
