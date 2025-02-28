<?php

namespace App;

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
        'name',
        'email',
        'password',
        'user_id',
        'type',
        'balance_of_leaves'
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

    public function boss()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function employees()
    {
        return $this->hasMany(User::class,'user_id');
    }


    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function bossLeaves()
    {
        return $this
            ->hasMany(Leave::class,'assigned_id')
            ->orderBy('created_at', 'DESC');
    }
}
