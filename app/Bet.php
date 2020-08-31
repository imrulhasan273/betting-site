<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $fillable = [
        'bet_by', 'match', 'game_id', 'question_id', 'answer_id', 'amount',
        'return_rate', 'total_win', 'return_amount', 'club_fee', 'status'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function answer()
    {
        return $this->belongsTo(Answer::class, 'answer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'bet_by');
    }
}
