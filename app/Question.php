<?php

namespace App;

use App\Game;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['game_id', 'question'];

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}
