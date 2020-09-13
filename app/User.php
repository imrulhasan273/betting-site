<?php

namespace App;

use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo', 'user_name', 'name', 'email', 'password', 'phone', 'club_id', 'sponsor_id', 'remember_token', 'credits', 'lock_credits'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')->withTimestamps();
    }

    public function ref()
    {
        return $this->belongsToMany(User::class, 'user_sponsor', 'user_id', 'sponsor_id')->withTimestamps();
    }

    //For Normal User
    public function club()
    {
        return $this->belongsToMany(Club::class, 'club_id');
    }

    //For Club Owner
    public function clubOwner()
    {
        return $this->belongsToMany(Club::class, 'club_user', 'user_id', 'club_id')->withTimestamps();
    }
}
