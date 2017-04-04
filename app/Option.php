<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Company;
use Auth;
use App\Options\Company_user;

class Option extends Model
{
    protected $fillable = [
        'company_id', 
        'name', 
        'slug', 
        'value', 
        'category', 
    ];


    public static function comID()
    {
        $userId = Auth::user()->id;
        $getComId = Company_user::where('user_id', '=', $userId)->first();
        return $getComId->company_id;
    }
    
    
    public static function getCurrentOption($cat='')
    {
    	$comID = Option::comID();
    	$company_option = Option::where('company_id', '=', $comID )->where('category', '=', $cat )->get();
    	return $company_option;
    }


    public static function optionDetails($id='')
    {
    	$comID = Option::comID();
    	$getDetail = Option::where('company_id', '=', $comID)->where('id', '=', $id)->first();
    	return $getDetail;
    }

    

}