<?php

namespace App\Options\Benefits;

use Illuminate\Database\Eloquent\Model;

use App\Employee;

class Benefit extends Model
{
    protected $fillable = [
        'salary_start', 
        'salary_end', 
        'employee', 
        'employer', 
        'type',
    ];

    public function getPhilhealth($salary='', $id='')
    {
        if ( $id != '') {
            $employee = Employee::find($id);
            $pay = $employee->basic_pay;
        }else{
            $pay = $salary;
        }
            $getBenefits = Benefit::where('type', '=', 'philhealth')->get();
            foreach ($getBenefits as $benefits) {
                if ($benefits->salary_start <= $pay AND $benefits->salary_end >= $pay ) 
                {
                    return $benefits->employee;
                }
            }    
    }

    public function getSSS($salary='', $id='')
    {
        if ( $id != '') {
            $employee = Employee::find($id);
            $pay = $employee->basic_pay;
        }else{
            $pay = $salary;
        }
        
    	$getBenefits = Benefit::where('type', '=', 'sss')->get();
    	foreach ($getBenefits as $benefits) {
    		if ($benefits->salary_start <= $pay AND $benefits->salary_end >= $pay ) 
			{
				return $benefits->employee;
			}
    	}	
    }



    public function InsertBenefitFunction()
    {
        if (Benefit::count() == 0 ){
            // [],[ 'status'=>'ME', 'salary_range'=> 1.65, 'percent_over' => 0.10, 'tax' => 198, ],];
            $tax = Benefit::insert($this->InsertTaxDataToDatabase());
            return $tax;

        }
    }







    public function InsertTaxDataToDatabase()
    {
        $data = array( 

            //sss
            array('salary_start'=> 1000, 'salary_end'=> 1249.99, 'employee' => 36.30, 'type' => 'sss'),
            array('salary_start'=> 1250, 'salary_end'=> 1749.99, 'employee' => 54.50, 'type' => 'sss'),
            array('salary_start'=> 1750, 'salary_end'=> 2249.99, 'employee' => 72.70, 'type' => 'sss'),
            array('salary_start'=> 2250, 'salary_end'=> 2749.99, 'employee' => 90.80, 'type' => 'sss'),
            array('salary_start'=> 2750, 'salary_end'=> 3249.99, 'employee' => 109.00, 'type' => 'sss'),

            array('salary_start'=> 3250, 'salary_end'=> 3749.99, 'employee' => 127.20, 'type' => 'sss'),
            array('salary_start'=> 3750, 'salary_end'=> 4249.99, 'employee' => 145.30, 'type' => 'sss'),
            array('salary_start'=> 4250, 'salary_end'=> 4749.99, 'employee' => 163.50, 'type' => 'sss'),
            array('salary_start'=> 4750, 'salary_end'=> 5249.99, 'employee' => 181.70, 'type' => 'sss'),
            array('salary_start'=> 5250, 'salary_end'=> 5749.99, 'employee' => 199.80, 'type' => 'sss'),

            array('salary_start'=> 5750, 'salary_end'=> 6249.99, 'employee' => 218.00, 'type' => 'sss'),
            array('salary_start'=> 6250, 'salary_end'=> 6749.99, 'employee' => 236.20, 'type' => 'sss'),
            array('salary_start'=> 6750, 'salary_end'=> 7249.99, 'employee' => 254.30, 'type' => 'sss'),
            array('salary_start'=> 7250, 'salary_end'=> 7749.99, 'employee' => 272.50, 'type' => 'sss'),
            array('salary_start'=> 7650, 'salary_end'=> 8249.99, 'employee' => 290.70, 'type' => 'sss'),

            array('salary_start'=> 8250, 'salary_end'=> 8749.99, 'employee' => 308.80, 'type' => 'sss'),
            array('salary_start'=> 8750, 'salary_end'=> 9249.99, 'employee' => 327.00, 'type' => 'sss'),
            array('salary_start'=> 9250, 'salary_end'=> 9749.99, 'employee' => 345.20, 'type' => 'sss'),
            array('salary_start'=> 9750, 'salary_end'=> 10249.99, 'employee' => 363.30, 'type' => 'sss'),
            array('salary_start'=> 10250, 'salary_end'=> 10749.99, 'employee' => 381.50, 'type' => 'sss'),

            array('salary_start'=> 10750, 'salary_end'=> 11249.99, 'employee' => 399.70, 'type' => 'sss'),
            array('salary_start'=> 11250, 'salary_end'=> 11749.99, 'employee' => 417.80, 'type' => 'sss'),
            array('salary_start'=> 11750, 'salary_end'=> 12249.99, 'employee' => 436.00, 'type' => 'sss'),
            array('salary_start'=> 12250, 'salary_end'=> 12749.99, 'employee' => 454.20, 'type' => 'sss'),
            array('salary_start'=> 12750, 'salary_end'=> 13249.99, 'employee' => 472.30, 'type' => 'sss'),

            array('salary_start'=> 13250, 'salary_end'=> 13749.99, 'employee' => 490.50, 'type' => 'sss'),
            array('salary_start'=> 13750, 'salary_end'=> 14249.99, 'employee' => 508.70, 'type' => 'sss'),
            array('salary_start'=> 14250, 'salary_end'=> 14749.99, 'employee' => 526.80, 'type' => 'sss'),
            array('salary_start'=> 14750, 'salary_end'=> 15249.99, 'employee' => 545.00, 'type' => 'sss'),
            array('salary_start'=> 15250, 'salary_end'=> 15749.99, 'employee' => 563.20, 'type' => 'sss'),
            array('salary_start'=> 15750, 'salary_end'=> 500000.00, 'employee' => 581.30, 'type' => 'sss'),
            

            //philhealth
            array('salary_start'=> 1, 'salary_end'=> 8999.99, 'employee' => 100.00, 'type' => 'philhealth'),
            array('salary_start'=> 9000.00, 'salary_end'=> 9999.99, 'employee' => 112.50, 'type' => 'philhealth'),
            array('salary_start'=> 10000.00, 'salary_end'=> 10999.99, 'employee' => 125.00, 'type' => 'philhealth'),
            array('salary_start'=> 11000.00, 'salary_end'=> 11999.99, 'employee' => 137.50, 'type' => 'philhealth'),
            array('salary_start'=> 12000.00, 'salary_end'=> 12999.99, 'employee' => 150.00, 'type' => 'philhealth'),

            array('salary_start'=> 13000.00, 'salary_end'=> 13999.99, 'employee' => 162.50, 'type' => 'philhealth'),
            array('salary_start'=> 14000.00, 'salary_end'=> 14999.99, 'employee' => 175.00, 'type' => 'philhealth'),
            array('salary_start'=> 15000.00, 'salary_end'=> 15999.99, 'employee' => 187.50, 'type' => 'philhealth'),
            array('salary_start'=> 16000.00, 'salary_end'=> 16999.99, 'employee' => 200.00, 'type' => 'philhealth'),
            array('salary_start'=> 17000.00, 'salary_end'=> 17999.99, 'employee' => 212.50, 'type' => 'philhealth'),

            array('salary_start'=> 18000.00, 'salary_end'=> 18999.99, 'employee' => 225.00, 'type' => 'philhealth'),
            array('salary_start'=> 19000.00, 'salary_end'=> 19999.99, 'employee' => 237.50, 'type' => 'philhealth'),
            array('salary_start'=> 20000.00, 'salary_end'=> 20999.99, 'employee' => 250.00, 'type' => 'philhealth'),
            array('salary_start'=> 21000.00, 'salary_end'=> 21999.99, 'employee' => 262.50, 'type' => 'philhealth'),
            array('salary_start'=> 22000.00, 'salary_end'=> 22999.99, 'employee' => 275.00, 'type' => 'philhealth'),

            array('salary_start'=> 23000.00, 'salary_end'=> 23999.99, 'employee' => 287.50, 'type' => 'philhealth'),
            array('salary_start'=> 24000.00, 'salary_end'=> 24999.99, 'employee' => 300.00, 'type' => 'philhealth'),
            array('salary_start'=> 25000.00, 'salary_end'=> 25999.99, 'employee' => 312.50, 'type' => 'philhealth'),
            array('salary_start'=> 26000.00, 'salary_end'=> 26999.99, 'employee' => 325.00, 'type' => 'philhealth'),
            array('salary_start'=> 27000.00, 'salary_end'=> 27999.99, 'employee' => 337.50, 'type' => 'philhealth'),

            array('salary_start'=> 28000.00, 'salary_end'=> 28999.99, 'employee' => 350.00, 'type' => 'philhealth'),
            array('salary_start'=> 29000.00, 'salary_end'=> 29999.99, 'employee' => 362.50, 'type' => 'philhealth'),
            array('salary_start'=> 30000.00, 'salary_end'=> 30999.99, 'employee' => 375.50, 'type' => 'philhealth'),
            array('salary_start'=> 31000.00, 'salary_end'=> 31999.99, 'employee' => 387.50, 'type' => 'philhealth'),
            array('salary_start'=> 32000.00, 'salary_end'=> 32999.99, 'employee' => 400.00, 'type' => 'philhealth'),

            array('salary_start'=> 33000.00, 'salary_end'=> 33999.99, 'employee' => 412.50, 'type' => 'philhealth'),
            array('salary_start'=> 34000.00, 'salary_end'=> 34999.99, 'employee' => 425.00, 'type' => 'philhealth'),
            array('salary_start'=> 35000.00, 'salary_end'=> 500000.00, 'employee' => 437.50, 'type' => 'philhealth'),
        
        );

        return $data;
    }

}
