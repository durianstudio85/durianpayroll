<?php

namespace App\Options\Benefits;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $fillable = [
        'salary_start', 
        'salary_end', 
        'employee', 
        'employer', 
        'type',
    ];

    public function getPhilhealth($pay='')
    {
    	$getBenefits = Benefit::where('type', '=', 'philhealth')->get();
    	foreach ($getBenefits as $benefits) {
    		if ($benefits->salary_start <= $pay AND $benefits->salary_end >= $pay ) 
			{
				return $benefits->employee;
			}
    	}
    }

    public function getSSS($pay='')
    {
    	$getBenefits = Benefit::where('type', '=', 'sss')->get();
    	foreach ($getBenefits as $benefits) {
    		if ($benefits->salary_start <= $pay AND $benefits->salary_end >= $pay ) 
			{
				return $benefits->employee;
			}
    	}	
    }

}
