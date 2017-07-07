<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;
use App\Options\Company_user;

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
        return $this->hasOne('App\Company');
    }
    
    
    













    public function getCompanyUser()
    {
        $user_id = Auth::user()->id;
        $company = Company_user::where('user_id')->first();
        return $company;
    }

    public function getUser()
    {
        $user = User::get();
        $userInfo = [];
        foreach ($user as $userGet) {
            $userInfo[$userGet->id] = $userGet->first_name.', '.$userGet->last_name ;
        }
        return $userInfo;
    }

}
