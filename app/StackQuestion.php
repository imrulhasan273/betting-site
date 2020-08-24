<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StackQuestion extends Model
{
    protected $fillable = ['auto_stack_cat_id', 'question', 'is_active'];
}
