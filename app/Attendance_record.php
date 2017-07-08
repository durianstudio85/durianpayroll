<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance_record extends Model
{
    protected $fillable = [
        'employee_id',
        'company_id', 
        'date', 
        'time_in',
        'time_out',
        'note',
        'ip_address',
        'browser',
    ];
    
    public function company()
    {
    	 return $this->hasOne('App\Company');
    }
    
    public function employee()
    {
    	return $this->hasOne('App\Employee', 'id', 'employee_id');
    }
}
