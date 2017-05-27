<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
        'company_id', 
        'payroll_id', 
        'date_start_range', 
        'date_end_range', 
        'status', 
        'pay_cycle',
    ];

}
