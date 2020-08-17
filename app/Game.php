<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['type_id', 'date', 'time', 'name', 'tournament_name', 'game_update', 'status'];
}
