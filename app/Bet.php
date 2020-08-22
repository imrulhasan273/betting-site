<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $fillable = [
        'bet_by', 'match', 'game_id', 'question_id', 'answer_id', 'amount',
        'return_rate', 'total_win', 'return_amount', 'club_fee', 'status'
    ];
}
