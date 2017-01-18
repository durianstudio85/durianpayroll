<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company()
    {
        return $this->belongsToMany('App\Company');
    }

    public function getUser()
    {
        $user = User::get();
        $userInfo = [];
        foreach ($user as $userGet) {
            $userInfo[$userGet->id] = $userGet->first_name.' '.$userGet->last_name;
        }
        return $userInfo;
    }

}
