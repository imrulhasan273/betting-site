<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable =  ['user_id', 'method_id', 'deposit_to', 'deposit_by', 'amount', 'transection_id', 'note', 'status'];
}
