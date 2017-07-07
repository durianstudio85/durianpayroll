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
    
    
    
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
    
    public function positions()
    {
        return $this->hasMany('App\Position');
    }
    
    public function payrolls()
    {
        return $this->hasMany('App\Payroll');
    }
    
    public function payroll_items()
    {
        return $this->hasMany('App\Payroll_item');
    }
    
}
