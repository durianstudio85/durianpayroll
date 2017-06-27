<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    protected $fillable = [
		'company_id',
        'employee_id',
        'last_name',
        'first_name',
        'middle_name',
        'gender',
        'status',
        'email',
        'tel_no',
        'mobile_no',
        'position',
        'basic_pay',
        'address',
        'ssn',
        'payment_mode',
        'password',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function payroll_items()
    {
        return $this->hasMany('App\Payroll_item');
    }
    
    public function loans()
    {
        return $this->hasMany('App\Loan');
    }


}
