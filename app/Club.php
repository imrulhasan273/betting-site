<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class, 'club_user', 'club_id', 'user_id');
    }
}
