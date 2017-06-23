<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Options\Company_user;
use Auth;

class Company extends Model
{

	protected $fillable = [
        'user_id',
        'company_name', 
        'trade_name', 
        'org_type',
        'company_logo',
        'business_address',
        'business_city',
        'business_zip',
        'business_country',
        'contact_email',
        'contact_telephone',
        'contact_telephone_ext',
        'contact_fax',
        'contact_web',
        'contact_mobile',
        'gov_business_cat',
        'gov_rdo',
        'gov_hdmf',
        'gov_tin',
        'gov_sss',
        'gov_philhealth',
        'nav',
        'salary_type',
    ];
    
    public function payrolls()
    {
        return $this->hasMany('App\Payroll');
    }

    public function user()
    {
    	return $this->belongsToMany('App\User');
    }
    
    public function company_user()
    {
        return $this->hasOne('App\Options\Company_user');
    }
    
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }







    public function getComId()
    {
        $userId = Auth::User()->id;
        $getComId = Company_user::where('user_id', '=', $userId)->first();
        return $getComId->company_id;
    }
    
    public function getDetails($id='')
    {
        $company = Company::find($id);
        return $company;
    }
}
