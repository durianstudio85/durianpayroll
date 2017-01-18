<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    protected $fillable = [
        'employee_id',
        'basic_pay', 
        'rate_type', 
        'effective_date', 
        'adjustment_date',
        'adjustment_reason',
        'created_by',
        'updated_by',
    ];
}
