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
}