<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll_item extends Model
{
    protected $fillable = [
        'company_id', 
        'payroll_id', 
        'employee_id', 
        'basic_pay', 
        'sss', 
        'pagibig',
        'philhealth',
        'tax',
        'deduction',
        'total_pay',
        'overtime',
        'night_differential',
        'double_pay',
        'holiday',
        'bonus',
        'absent',
        'loans',
        'others'
    ];
    
    public function employee()
    {
        return $this->hasOne('App\Employee','id', 'employee_id');
    }
    
    public function payroll()
    {
        return $this->hasOne('App\Payroll','id', 'payroll_id');
    }
    
    
}
