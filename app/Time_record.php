<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time_record extends Model
{
    protected $fillable = [
        'company_id', 
        'employee_id', 
        'timein', 
        'timeout', 
        'note',
    ];
}
