<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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
    ];
}
