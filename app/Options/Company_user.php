<?php

namespace App\Options;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Company_user extends Model
{
    protected $fillable = [
        'user_id', 
        'company_id', 
        'company_position', 
    ];


    public static function getCompanyPosition()
    {
    	$user_id = Auth::user()->id;
        $company = Company_user::where('user_id','=', $user_id)->first();
        return $company->company_position;
    }
}
