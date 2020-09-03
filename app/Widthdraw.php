<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widthdraw extends Model
{
    protected $fillable = ['user_id', 'user_role', 'method', 'amount', 'widthdraw_to', 'note', 'status'];
}
