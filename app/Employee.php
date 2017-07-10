<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    protected $fillable = [
		'company_id',
        'empID',
        'last_name',
        'first_name',
        'middle_name',
        'gender',
        'status',
        'email',
        'tel_no',
        'mobile_no',
        'position_id',
        'basic_pay',
        'address',
        'ssn',
        'payment_mode',
        'acc_status',
        
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function position()
    {
        return $this->hasOne('App\Position','id', 'position_id');
    }
    
    public function payslips()
    {
        return $this->hasMany('App\Payroll_item');
    }
    
    public function company()
    {
        return $this->hasOne('App\Company','id', 'company_id');
    }
    
    public function loans()
    {
        return $this->hasMany('App\Loan');
    }
    
    
    public function attendance()
    {
        return $this->hasMany('App\Attendance_record');
    }
        
    public function payroll_items()
    {
        return $this->hasMany('App\Payroll_item');
    }
    
}
