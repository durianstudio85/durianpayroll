<?php

namespace App\Options;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $fillable = [
        'status', 'salary_range', 'percent_over', 'tax', 'salary_type',
    ];


    public function InsertTaxFunction()
    {
    	if (Tax::count() == 0 ){
    		// [],[ 'status'=>'ME', 'salary_range'=> 1.65, 'percent_over' => 0.10, 'tax' => 198, ],];
        	$tax = Tax::insert($this->InsertTaxDataToDatabase());
        	return $tax;

        }
    }








































    public function InsertTaxDataToDatabase()
    {
    	$data = array(
		    // Daily Salary
		    // 1st column
		    array('status'=>'S', 'salary_range'=> 1.65, 'percent_over' => 0.10, 'tax' => 198, 'salary_type' => 'd'),
		    array('status'=>'ME', 'salary_range'=> 1.65, 'percent_over' => 0.10, 'tax' => 198, 'salary_type' => 'd'),

		    // 2nd column
		    array('status'=>'S', 'salary_range'=> 8.25, 'percent_over' => 0.15, 'tax' => 264, 'salary_type' => 'd'),
		    array('status'=>'ME', 'salary_range'=> 8.25, 'percent_over' => 0.15, 'tax' => 264, 'salary_type' => 'd'),
		    
		    array('status'=>'S', 'salary_range'=> 28.05, 'percent_over' => 0.20, 'tax' => 396, 'salary_type' => 'd'),
		    array('status'=>'ME', 'salary_range'=> 28.05, 'percent_over' => 0.20, 'tax' => 396, 'salary_type' => 'd'),

		    array('status'=>'S', 'salary_range'=> 74.2, 'percent_over' => 0.25, 'tax' => 627, 'salary_type' => 'd'),
		    array('status'=>'ME', 'salary_range'=> 74.2, 'percent_over' => 0.25, 'tax' => 627, 'salary_type' => 'd'),

		    array('status'=>'S', 'salary_range'=> 165.02, 'percent_over' => 0.30, 'tax' => 990, 'salary_type' => 'd'),
		    array('status'=>'ME', 'salary_range'=> 165.02, 'percent_over' => 0.30, 'tax' => 990, 'salary_type' => 'd'),

		    array('status'=>'S', 'salary_range'=> 412.54, 'percent_over' => 0.32, 'tax' => 1815, 'salary_type' => 'd'),
		    array('status'=>'ME', 'salary_range'=> 412.54, 'percent_over' => 0.32, 'tax' => 1815, 'salary_type' => 'd'),
		    
		    //ME1/S1
		    array('status'=>'ME1', 'salary_range'=> 1.65, 'percent_over' => 0.10, 'tax' => 281, 'salary_type' => 'd'),
		    array('status'=>'S1', 'salary_range'=> 1.65, 'percent_over' => 0.10, 'tax' => 281, 'salary_type' => 'd'),

		    array('status'=>'ME1', 'salary_range'=> 8.25, 'percent_over' => 0.15, 'tax' => 347, 'salary_type' => 'd'),
		    array('status'=>'S1', 'salary_range'=> 8.25, 'percent_over' => 0.15, 'tax' => 347, 'salary_type' => 'd'),

		    array('status'=>'ME1', 'salary_range'=> 28.05, 'percent_over' => 0.20, 'tax' => 479, 'salary_type' => 'd'),
		    array('status'=>'S1', 'salary_range'=> 28.05, 'percent_over' => 0.20, 'tax' => 479, 'salary_type' => 'd'),

		    array('status'=>'ME1', 'salary_range'=> 74.2, 'percent_over' => 0.25, 'tax' => 710, 'salary_type' => 'd'),
		    array('status'=>'S1', 'salary_range'=> 74.2, 'percent_over' => 0.25, 'tax' => 710, 'salary_type' => 'd'),

		    array('status'=>'ME1', 'salary_range'=> 165.02, 'percent_over' => 0.30, 'tax' => 1073, 'salary_type' => 'd'),
		    array('status'=>'S1', 'salary_range'=> 165.02, 'percent_over' => 0.30, 'tax' => 1073, 'salary_type' => 'd'),

		    array('status'=>'ME1', 'salary_range'=> 412.54, 'percent_over' => 0.32, 'tax' => 1898, 'salary_type' => 'd'),
		    array('status'=>'S1', 'salary_range'=> 412.54, 'percent_over' => 0.32, 'tax' => 1898, 'salary_type' => 'd'),
		    
		    //ME2/S2
		    array('status'=>'ME2', 'salary_range'=> 1.65, 'percent_over' => 0.10, 'tax' => 363, 'salary_type' => 'd'),
		    array('status'=>'S2', 'salary_range'=> 1.65, 'percent_over' => 0.10, 'tax' => 363, 'salary_type' => 'd'),

		    array('status'=>'ME2', 'salary_range'=> 8.25, 'percent_over' => 0.15, 'tax' => 429, 'salary_type' => 'd'),
		    array('status'=>'S2', 'salary_range'=> 8.25, 'percent_over' => 0.15, 'tax' => 429, 'salary_type' => 'd'),

		    array('status'=>'ME2', 'salary_range'=> 28.05, 'percent_over' => 0.20, 'tax' => 561, 'salary_type' => 'd'),
		    array('status'=>'S2', 'salary_range'=> 28.05, 'percent_over' => 0.20, 'tax' => 561, 'salary_type' => 'd'),

		    array('status'=>'ME2', 'salary_range'=> 74.2, 'percent_over' => 0.25, 'tax' => 792, 'salary_type' => 'd'),
		    array('status'=>'S2', 'salary_range'=> 74.2, 'percent_over' => 0.25, 'tax' => 792, 'salary_type' => 'd'),

		    array('status'=>'ME2', 'salary_range'=> 165.02, 'percent_over' => 0.30, 'tax' => 1155, 'salary_type' => 'd'),
		    array('status'=>'S2', 'salary_range'=> 165.02, 'percent_over' => 0.30, 'tax' => 1155, 'salary_type' => 'd'),

		    array('status'=>'ME2', 'salary_range'=> 412.54, 'percent_over' => 0.32, 'tax' => 1980, 'salary_type' => 'd'),
		    array('status'=>'S2', 'salary_range'=> 412.54, 'percent_over' => 0.32, 'tax' => 1980, 'salary_type' => 'd'),

		    //ME3/S3
		    array('status'=>'ME3', 'salary_range'=> 1.65, 'percent_over' => 0.10, 'tax' => 446, 'salary_type' => 'd'),
		    array('status'=>'S3', 'salary_range'=> 1.65, 'percent_over' => 0.10, 'tax' => 446, 'salary_type' => 'd'),

		    array('status'=>'ME3', 'salary_range'=> 8.25, 'percent_over' => 0.15, 'tax' => 512, 'salary_type' => 'd'),
		    array('status'=>'S3', 'salary_range'=> 8.25, 'percent_over' => 0.15, 'tax' => 512, 'salary_type' => 'd'),

		    array('status'=>'ME3', 'salary_range'=> 28.05, 'percent_over' => 0.20, 'tax' => 644, 'salary_type' => 'd'),
		    array('status'=>'S3', 'salary_range'=> 28.05, 'percent_over' => 0.20, 'tax' => 644, 'salary_type' => 'd'),

		    array('status'=>'ME3', 'salary_range'=> 74.2, 'percent_over' => 0.25, 'tax' => 875, 'salary_type' => 'd'),
		    array('status'=>'S3', 'salary_range'=> 74.2, 'percent_over' => 0.25, 'tax' => 875, 'salary_type' => 'd'),

		    array('status'=>'ME3', 'salary_range'=> 165.02, 'percent_over' => 0.30, 'tax' => 1238, 'salary_type' => 'd'),
		    array('status'=>'S3', 'salary_range'=> 165.02, 'percent_over' => 0.30, 'tax' => 1238, 'salary_type' => 'd'),

		    array('status'=>'ME3', 'salary_range'=> 412.54, 'percent_over' => 0.32, 'tax' => 2306, 'salary_type' => 'd'),
		    array('status'=>'S3', 'salary_range'=> 412.54, 'percent_over' => 0.32, 'tax' => 2306, 'salary_type' => 'd'),

		    //ME4/S4
		    array('status'=>'ME4', 'salary_range'=> 1.65, 'percent_over' => 0.10, 'tax' => 528, 'salary_type' => 'd'),
		    array('status'=>'S4', 'salary_range'=> 1.65, 'percent_over' => 0.10, 'tax' => 528, 'salary_type' => 'd'),

		    array('status'=>'ME4', 'salary_range'=> 8.25, 'percent_over' => 0.15, 'tax' => 594, 'salary_type' => 'd'),
		    array('status'=>'S4', 'salary_range'=> 8.25, 'percent_over' => 0.15, 'tax' => 594, 'salary_type' => 'd'),

		    array('status'=>'ME4', 'salary_range'=> 28.05, 'percent_over' => 0.20, 'tax' => 726, 'salary_type' => 'd'),
		    array('status'=>'S4', 'salary_range'=> 28.05, 'percent_over' => 0.20, 'tax' => 726, 'salary_type' => 'd'),

		    array('status'=>'ME4', 'salary_range'=> 74.2, 'percent_over' => 0.25, 'tax' => 957, 'salary_type' => 'd'),
		    array('status'=>'S4', 'salary_range'=> 74.2, 'percent_over' => 0.25, 'tax' => 957, 'salary_type' => 'd'),

		    array('status'=>'ME4', 'salary_range'=> 165.02, 'percent_over' => 0.30, 'tax' => 1320, 'salary_type' => 'd'),
		    array('status'=>'S4', 'salary_range'=> 165.02, 'percent_over' => 0.30, 'tax' => 1320, 'salary_type' => 'd'),

		    array('status'=>'ME4', 'salary_range'=> 412.54, 'percent_over' => 0.32, 'tax' => 2145, 'salary_type' => 'd'),
		    array('status'=>'S4', 'salary_range'=> 412.54, 'percent_over' => 0.32, 'tax' => 2145, 'salary_type' => 'd'),

		    //WEEKLY
		    array('status'=>'S', 'salary_range'=> 9.62, 'percent_over' => 0.10, 'tax' => 1154, 'salary_type' => 'w'),
		    array('status'=>'ME', 'salary_range'=> 9.62, 'percent_over' => 0.10, 'tax' => 1154, 'salary_type' => 'w'),

		    array('status'=>'S', 'salary_range'=> 48.08, 'percent_over' => 0.15, 'tax' => 1538, 'salary_type' => 'w'),
		    array('status'=>'ME', 'salary_range'=> 48.08, 'percent_over' => 0.15, 'tax' => 1538, 'salary_type' => 'w'),
		    
		    array('status'=>'S', 'salary_range'=> 163.46, 'percent_over' => 0.20, 'tax' => 2308, 'salary_type' => 'w'),
		    array('status'=>'ME', 'salary_range'=> 163.46, 'percent_over' => 0.20, 'tax' => 2308, 'salary_type' => 'w'),

		    array('status'=>'S', 'salary_range'=> 432.69, 'percent_over' => 0.25, 'tax' => 3654, 'salary_type' => 'w'),
		    array('status'=>'ME', 'salary_range'=> 432.69, 'percent_over' => 0.25, 'tax' => 3654, 'salary_type' => 'w'),

		    array('status'=>'S', 'salary_range'=> 961.54, 'percent_over' => 0.30, 'tax' => 5769, 'salary_type' => 'w'),
		    array('status'=>'ME', 'salary_range'=> 961.54, 'percent_over' => 0.30, 'tax' => 5769, 'salary_type' => 'w'),

		    array('status'=>'S', 'salary_range'=> 2403.85, 'percent_over' => 0.32, 'tax' => 10577, 'salary_type' => 'w'),
		    array('status'=>'ME', 'salary_range'=> 2403.85, 'percent_over' => 0.32, 'tax' => 10577, 'salary_type' => 'w'),

		    //ME1/S1
		    array('status'=>'ME1', 'salary_range'=> 9.62, 'percent_over' => 0.10, 'tax' => 1635, 'salary_type' => 'w'),
		    array('status'=>'S1', 'salary_range'=> 9.62, 'percent_over' => 0.10, 'tax' => 1635, 'salary_type' => 'w'),

		    array('status'=>'ME1', 'salary_range'=> 48.08, 'percent_over' => 0.15, 'tax' => 2019, 'salary_type' => 'w'),
		    array('status'=>'S1', 'salary_range'=> 48.08, 'percent_over' => 0.15, 'tax' => 2019, 'salary_type' => 'w'),

		    array('status'=>'ME1', 'salary_range'=> 163.46, 'percent_over' => 0.20, 'tax' => 2788, 'salary_type' => 'w'),
		    array('status'=>'S1', 'salary_range'=> 163.46, 'percent_over' => 0.20, 'tax' => 2788, 'salary_type' => 'w'),

		    array('status'=>'ME1', 'salary_range'=> 432.69, 'percent_over' => 0.25, 'tax' => 4135, 'salary_type' => 'w'),
		    array('status'=>'S1', 'salary_range'=> 432.69, 'percent_over' => 0.25, 'tax' => 4135, 'salary_type' => 'w'),

		    array('status'=>'ME1', 'salary_range'=> 961.54, 'percent_over' => 0.30, 'tax' => 6250, 'salary_type' => 'w'),
		    array('status'=>'S1', 'salary_range'=> 961.54, 'percent_over' => 0.30, 'tax' => 6250, 'salary_type' => 'w'),

		    array('status'=>'ME1', 'salary_range'=> 2403.85, 'percent_over' => 0.32, 'tax' => 11058, 'salary_type' => 'w'),
		    array('status'=>'S1', 'salary_range'=> 2403.85, 'percent_over' => 0.32, 'tax' => 11058, 'salary_type' => 'w'),

		    // ME2/S2

		    array('status'=>'ME2', 'salary_range'=> 9.62, 'percent_over' => 0.10, 'tax' => 2115, 'salary_type' => 'w'),
		    array('status'=>'ME3', 'salary_range'=> 9.62, 'percent_over' => 0.10, 'tax' => 2593, 'salary_type' => 'w'),
		    array('status'=>'ME4', 'salary_range'=> 9.62, 'percent_over' => 0.10, 'tax' => 3077, 'salary_type' => 'w'),

		    array('status'=>'S2', 'salary_range'=> 9.62, 'percent_over' => 0.10, 'tax' => 2115, 'salary_type' => 'w'),
		    array('status'=>'S3', 'salary_range'=> 9.62, 'percent_over' => 0.10, 'tax' => 2593, 'salary_type' => 'w'),
		    array('status'=>'S4', 'salary_range'=> 9.62, 'percent_over' => 0.10, 'tax' => 3077, 'salary_type' => 'w'),

		    array('status'=>'ME2', 'salary_range'=> 48.08, 'percent_over' => 0.15, 'tax' => 2500, 'salary_type' => 'w'),
		    array('status'=>'ME3', 'salary_range'=> 48.08, 'percent_over' => 0.15, 'tax' => 2981, 'salary_type' => 'w'),
		    array('status'=>'ME4', 'salary_range'=> 48.08, 'percent_over' => 0.15, 'tax' => 3462, 'salary_type' => 'w'),

		    array('status'=>'S2', 'salary_range'=> 48.08, 'percent_over' => 0.15, 'tax' => 2500, 'salary_type' => 'w'),
		    array('status'=>'S3', 'salary_range'=> 48.08, 'percent_over' => 0.15, 'tax' => 2981, 'salary_type' => 'w'),
		    array('status'=>'S4', 'salary_range'=> 48.08, 'percent_over' => 0.15, 'tax' => 3462, 'salary_type' => 'w'),

		    array('status'=>'ME2', 'salary_range'=> 163.46, 'percent_over' => 0.20, 'tax' => 3269, 'salary_type' => 'w'),
		    array('status'=>'ME3', 'salary_range'=> 163.46, 'percent_over' => 0.20, 'tax' => 3750, 'salary_type' => 'w'),
		    array('status'=>'ME4', 'salary_range'=> 163.46, 'percent_over' => 0.20, 'tax' => 4231, 'salary_type' => 'w'),

		    array('status'=>'S2', 'salary_range'=> 163.46, 'percent_over' => 0.20, 'tax' => 3269, 'salary_type' => 'w'),
		    array('status'=>'S3', 'salary_range'=> 163.46, 'percent_over' => 0.20, 'tax' => 3750, 'salary_type' => 'w'),
		    array('status'=>'S4', 'salary_range'=> 163.46, 'percent_over' => 0.20, 'tax' => 4231, 'salary_type' => 'w'),

		    //================================== COLUMN 6
		    array('status'=>'ME2', 'salary_range'=> 432.69, 'percent_over' => 0.25, 'tax' => 4615, 'salary_type' => 'w'),
		    array('status'=>'ME3', 'salary_range'=> 432.69, 'percent_over' => 0.25, 'tax' => 5096, 'salary_type' => 'w'),
		    array('status'=>'ME4', 'salary_range'=> 432.69, 'percent_over' => 0.25, 'tax' => 5577, 'salary_type' => 'w'),

		    array('status'=>'S2', 'salary_range'=> 432.69, 'percent_over' => 0.25, 'tax' => 4615, 'salary_type' => 'w'),
		    array('status'=>'S3', 'salary_range'=> 432.69, 'percent_over' => 0.25, 'tax' => 5096, 'salary_type' => 'w'),
		    array('status'=>'S4', 'salary_range'=> 432.69, 'percent_over' => 0.25, 'tax' => 5577, 'salary_type' => 'w'),
		    //WWWWWWWWWWWW
		    array('status'=>'ME2', 'salary_range'=> 961.54, 'percent_over' => 0.30, 'tax' => 6731, 'salary_type' => 'w'),
		    array('status'=>'ME3', 'salary_range'=> 961.54, 'percent_over' => 0.30, 'tax' => 7212, 'salary_type' => 'w'),
		    array('status'=>'ME4', 'salary_range'=> 961.54, 'percent_over' => 0.30, 'tax' => 7692, 'salary_type' => 'w'),

		    array('status'=>'S2', 'salary_range'=> 961.54, 'percent_over' => 0.30, 'tax' => 6731, 'salary_type' => 'w'),
		    array('status'=>'S3', 'salary_range'=> 961.54, 'percent_over' => 0.30, 'tax' => 7212, 'salary_type' => 'w'),
		    array('status'=>'S4', 'salary_range'=> 961.54, 'percent_over' => 0.30, 'tax' => 7692, 'salary_type' => 'w'),

		    //====================
		    array('status'=>'ME2', 'salary_range'=> 2403.85, 'percent_over' => 0.32, 'tax' => 11538, 'salary_type' => 'w'),
		    array('status'=>'ME3', 'salary_range'=> 2403.85, 'percent_over' => 0.32, 'tax' => 12019, 'salary_type' => 'w'),
		    array('status'=>'ME4', 'salary_range'=> 2403.85, 'percent_over' => 0.32, 'tax' => 12500, 'salary_type' => 'w'),


		    //SEMI MONTHLY
		    array('status'=>'ME', 'salary_range'=> 20.83, 'percent_over' => 0.10, 'tax' => 2500, 'salary_type' => 'sm'),
		    array('status'=>'ME1', 'salary_range'=> 20.83, 'percent_over' => 0.10, 'tax' => 3542, 'salary_type' => 'sm'),
		    array('status'=>'ME2', 'salary_range'=> 20.83, 'percent_over' => 0.10, 'tax' => 4583, 'salary_type' => 'sm'),
		    array('status'=>'ME3', 'salary_range'=> 20.83, 'percent_over' => 0.10, 'tax' => 5625, 'salary_type' => 'sm'),
		    array('status'=>'ME4', 'salary_range'=> 20.83, 'percent_over' => 0.10, 'tax' => 6667, 'salary_type' => 'sm'),

		    array('status'=>'ME', 'salary_range'=> 104.17, 'percent_over' => 0.15, 'tax' => 3333, 'salary_type' => 'sm'),
		    array('status'=>'ME1', 'salary_range'=> 104.17, 'percent_over' => 0.15, 'tax' => 4375, 'salary_type' => 'sm'),
		    array('status'=>'ME2', 'salary_range'=> 104.17, 'percent_over' => 0.15, 'tax' => 5417, 'salary_type' => 'sm'),
		    array('status'=>'ME3', 'salary_range'=> 104.17, 'percent_over' => 0.15, 'tax' => 6458, 'salary_type' => 'sm'),
		    array('status'=>'ME4', 'salary_range'=> 104.17, 'percent_over' => 0.15, 'tax' => 7500, 'salary_type' => 'sm'),

		    array('status'=>'ME', 'salary_range'=> 354.17, 'percent_over' => 0.20, 'tax' => 5000, 'salary_type' => 'sm'),
		    array('status'=>'ME1', 'salary_range'=> 354.17, 'percent_over' => 0.20, 'tax' => 6042, 'salary_type' => 'sm'),
		    array('status'=>'ME2', 'salary_range'=> 354.17, 'percent_over' => 0.20, 'tax' => 7083, 'salary_type' => 'sm'),
		    array('status'=>'ME3', 'salary_range'=> 354.17, 'percent_over' => 0.20, 'tax' => 8125, 'salary_type' => 'sm'),
		    array('status'=>'ME4', 'salary_range'=> 354.17, 'percent_over' => 0.20, 'tax' => 9167, 'salary_type' => 'sm'),

		    array('status'=>'ME', 'salary_range'=> 937.50, 'percent_over' => 0.25, 'tax' => 7919, 'salary_type' => 'sm'),
		    array('status'=>'ME1', 'salary_range'=> 937.50, 'percent_over' => 0.25, 'tax' => 8958, 'salary_type' => 'sm'),
		    array('status'=>'ME2', 'salary_range'=> 937.50, 'percent_over' => 0.25, 'tax' => 10000, 'salary_type' => 'sm'),
		    array('status'=>'ME3', 'salary_range'=> 937.50, 'percent_over' => 0.25, 'tax' => 11042, 'salary_type' => 'sm'),
		    array('status'=>'ME4', 'salary_range'=> 937.50, 'percent_over' => 0.25, 'tax' => 12083, 'salary_type' => 'sm'),

		    array('status'=>'ME', 'salary_range'=> 2083.33, 'percent_over' => 0.30, 'tax' => 12500, 'salary_type' => 'sm'),
		    array('status'=>'ME1', 'salary_range'=> 2083.33, 'percent_over' => 0.30, 'tax' => 13542, 'salary_type' => 'sm'),
		    array('status'=>'ME2', 'salary_range'=> 2083.33, 'percent_over' => 0.30, 'tax' => 14583, 'salary_type' => 'sm'),
		    array('status'=>'ME3', 'salary_range'=> 2083.33, 'percent_over' => 0.30, 'tax' => 15625, 'salary_type' => 'sm'),
		    array('status'=>'ME4', 'salary_range'=> 2083.33, 'percent_over' => 0.30, 'tax' => 16667, 'salary_type' => 'sm'),

		    array('status'=>'ME', 'salary_range'=> 5208.33, 'percent_over' => 0.32, 'tax' => 22917, 'salary_type' => 'sm'),
		    array('status'=>'ME1', 'salary_range'=> 5208.33, 'percent_over' => 0.32, 'tax' => 23958, 'salary_type' => 'sm'),
		    array('status'=>'ME2', 'salary_range'=> 5208.33, 'percent_over' => 0.32, 'tax' => 25000, 'salary_type' => 'sm'),
		    array('status'=>'ME3', 'salary_range'=> 5208.33, 'percent_over' => 0.32, 'tax' => 26042, 'salary_type' => 'sm'),
		    array('status'=>'ME4', 'salary_range'=> 5208.33, 'percent_over' => 0.32, 'tax' => 27083, 'salary_type' => 'sm'),

		    //S
		    array('status'=>'S', 'salary_range'=> 20.83, 'percent_over' => 0.10, 'tax' => 2500, 'salary_type' => 'sm'),
		    array('status'=>'S1', 'salary_range'=> 20.83, 'percent_over' => 0.10, 'tax' => 3542, 'salary_type' => 'sm'),
		    array('status'=>'S2', 'salary_range'=> 20.83, 'percent_over' => 0.10, 'tax' => 4583, 'salary_type' => 'sm'),
		    array('status'=>'S3', 'salary_range'=> 20.83, 'percent_over' => 0.10, 'tax' => 5625, 'salary_type' => 'sm'),
		    array('status'=>'S4', 'salary_range'=> 20.83, 'percent_over' => 0.10, 'tax' => 6667, 'salary_type' => 'sm'),

		    array('status'=>'S', 'salary_range'=> 104.17, 'percent_over' => 0.15, 'tax' => 3333, 'salary_type' => 'sm'),
		    array('status'=>'S1', 'salary_range'=> 104.17, 'percent_over' => 0.15, 'tax' => 4375, 'salary_type' => 'sm'),
		    array('status'=>'S2', 'salary_range'=> 104.17, 'percent_over' => 0.15, 'tax' => 5417, 'salary_type' => 'sm'),
		    array('status'=>'S3', 'salary_range'=> 104.17, 'percent_over' => 0.15, 'tax' => 6458, 'salary_type' => 'sm'),
		    array('status'=>'S4', 'salary_range'=> 104.17, 'percent_over' => 0.15, 'tax' => 7500, 'salary_type' => 'sm'),

		    array('status'=>'S', 'salary_range'=> 354.17, 'percent_over' => 0.20, 'tax' => 5000, 'salary_type' => 'sm'),
		    array('status'=>'S1', 'salary_range'=> 354.17, 'percent_over' => 0.20, 'tax' => 6042, 'salary_type' => 'sm'),
		    array('status'=>'S2', 'salary_range'=> 354.17, 'percent_over' => 0.20, 'tax' => 7083, 'salary_type' => 'sm'),
		    array('status'=>'S3', 'salary_range'=> 354.17, 'percent_over' => 0.20, 'tax' => 8125, 'salary_type' => 'sm'),
		    array('status'=>'S4', 'salary_range'=> 354.17, 'percent_over' => 0.20, 'tax' => 9167, 'salary_type' => 'sm'),

		    array('status'=>'S', 'salary_range'=> 937.50, 'percent_over' => 0.25, 'tax' => 7919, 'salary_type' => 'sm'),
		    array('status'=>'S1', 'salary_range'=> 937.50, 'percent_over' => 0.25, 'tax' => 8958, 'salary_type' => 'sm'),
		    array('status'=>'S2', 'salary_range'=> 937.50, 'percent_over' => 0.25, 'tax' => 10000, 'salary_type' => 'sm'),
		    array('status'=>'S3', 'salary_range'=> 937.50, 'percent_over' => 0.25, 'tax' => 11042, 'salary_type' => 'sm'),
		    array('status'=>'S4', 'salary_range'=> 937.50, 'percent_over' => 0.25, 'tax' => 12083, 'salary_type' => 'sm'),

		    array('status'=>'S', 'salary_range'=> 2083.33, 'percent_over' => 0.30, 'tax' => 12500, 'salary_type' => 'sm'),
		    array('status'=>'S1', 'salary_range'=> 2083.33, 'percent_over' => 0.30, 'tax' => 13542, 'salary_type' => 'sm'),
		    array('status'=>'S2', 'salary_range'=> 2083.33, 'percent_over' => 0.30, 'tax' => 14583, 'salary_type' => 'sm'),
		    array('status'=>'S3', 'salary_range'=> 2083.33, 'percent_over' => 0.30, 'tax' => 15625, 'salary_type' => 'sm'),
		    array('status'=>'S4', 'salary_range'=> 2083.33, 'percent_over' => 0.30, 'tax' => 16667, 'salary_type' => 'sm'),

		    array('status'=>'S', 'salary_range'=> 5208.33, 'percent_over' => 0.32, 'tax' => 22917, 'salary_type' => 'sm'),
		    array('status'=>'S1', 'salary_range'=> 5208.33, 'percent_over' => 0.32, 'tax' => 23958, 'salary_type' => 'sm'),
		    array('status'=>'S2', 'salary_range'=> 5208.33, 'percent_over' => 0.32, 'tax' => 25000, 'salary_type' => 'sm'),
		    array('status'=>'S3', 'salary_range'=> 5208.33, 'percent_over' => 0.32, 'tax' => 26042, 'salary_type' => 'sm'),
		    array('status'=>'S4', 'salary_range'=> 5208.33, 'percent_over' => 0.32, 'tax' => 27083, 'salary_type' => 'sm'),


		    //MONTLY
		    array('status'=>'ME', 'salary_range'=> 41.67, 'percent_over' => 0.10, 'tax' => 5000, 'salary_type' => 'm'),
		    array('status'=>'ME1', 'salary_range'=> 41.67, 'percent_over' => 0.10, 'tax' => 7083, 'salary_type' => 'm'),
		    array('status'=>'ME2', 'salary_range'=> 41.67, 'percent_over' => 0.10, 'tax' => 9167, 'salary_type' => 'm'),
		    array('status'=>'ME3', 'salary_range'=> 41.67, 'percent_over' => 0.10, 'tax' => 11250, 'salary_type' => 'm'),
		    array('status'=>'ME4', 'salary_range'=> 41.67, 'percent_over' => 0.10, 'tax' => 13333, 'salary_type' => 'm'),

		    array('status'=>'ME', 'salary_range'=> 208.33, 'percent_over' => 0.15, 'tax' => 6667, 'salary_type' => 'm'),
		    array('status'=>'ME1', 'salary_range'=> 208.33, 'percent_over' => 0.15, 'tax' => 8750, 'salary_type' => 'm'),
		    array('status'=>'ME2', 'salary_range'=> 208.33, 'percent_over' => 0.15, 'tax' => 10833, 'salary_type' => 'm'),
		    array('status'=>'ME3', 'salary_range'=> 208.33, 'percent_over' => 0.15, 'tax' => 12917, 'salary_type' => 'm'),
		    array('status'=>'ME4', 'salary_range'=> 208.33, 'percent_over' => 0.15, 'tax' => 15000, 'salary_type' => 'm'),

		    array('status'=>'ME', 'salary_range'=> 708.33, 'percent_over' => 0.20, 'tax' => 10000, 'salary_type' => 'm'),
		    array('status'=>'ME1', 'salary_range'=> 708.33, 'percent_over' => 0.20, 'tax' => 12083, 'salary_type' => 'm'),
		    array('status'=>'ME2', 'salary_range'=> 708.33, 'percent_over' => 0.20, 'tax' => 14167, 'salary_type' => 'm'),
		    array('status'=>'ME3', 'salary_range'=> 708.33, 'percent_over' => 0.20, 'tax' => 16250, 'salary_type' => 'm'),
		    array('status'=>'ME4', 'salary_range'=> 708.33, 'percent_over' => 0.20, 'tax' => 18333, 'salary_type' => 'm'),

		    array('status'=>'ME', 'salary_range'=> 1875.00, 'percent_over' => 0.25, 'tax' => 15833, 'salary_type' => 'm'),
		    array('status'=>'ME1', 'salary_range'=> 1875.00, 'percent_over' => 0.25, 'tax' => 17917, 'salary_type' => 'm'),
		    array('status'=>'ME2', 'salary_range'=> 1875.00, 'percent_over' => 0.25, 'tax' => 20000, 'salary_type' => 'm'),
		    array('status'=>'ME3', 'salary_range'=> 1875.00, 'percent_over' => 0.25, 'tax' => 22083, 'salary_type' => 'm'),
		    array('status'=>'ME4', 'salary_range'=> 1875.00, 'percent_over' => 0.25, 'tax' => 24167, 'salary_type' => 'm'),

		    array('status'=>'ME', 'salary_range'=> 4166.67, 'percent_over' => 0.30, 'tax' => 25000, 'salary_type' => 'm'),
		    array('status'=>'ME1', 'salary_range'=> 4166.67, 'percent_over' => 0.30, 'tax' => 27083, 'salary_type' => 'm'),
		    array('status'=>'ME2', 'salary_range'=> 4166.67, 'percent_over' => 0.30, 'tax' => 29167, 'salary_type' => 'm'),
		    array('status'=>'ME3', 'salary_range'=> 4166.67, 'percent_over' => 0.30, 'tax' => 31250, 'salary_type' => 'm'),
		    array('status'=>'ME4', 'salary_range'=> 4166.67, 'percent_over' => 0.30, 'tax' => 33333, 'salary_type' => 'm'),

		    array('status'=>'ME', 'salary_range'=> 10416.67, 'percent_over' => 0.32, 'tax' => 45833, 'salary_type' => 'm'),
		    array('status'=>'ME1', 'salary_range'=> 10416.67, 'percent_over' => 0.32, 'tax' => 47917, 'salary_type' => 'm'),
		    array('status'=>'ME2', 'salary_range'=> 10416.67, 'percent_over' => 0.32, 'tax' => 50000, 'salary_type' => 'm'),
		    array('status'=>'ME3', 'salary_range'=> 10416.67, 'percent_over' => 0.32, 'tax' => 52083, 'salary_type' => 'm'),
		    array('status'=>'ME4', 'salary_range'=> 10416.67, 'percent_over' => 0.32, 'tax' => 54167, 'salary_type' => 'm'),


		    //SSSSSSSSSSSSSSSSS
		    array('status'=>'S', 'salary_range'=> 41.67, 'percent_over' => 0.10, 'tax' => 5000, 'salary_type' => 'm'),
		    array('status'=>'S1', 'salary_range'=> 41.67, 'percent_over' => 0.10, 'tax' => 7083, 'salary_type' => 'm'),
		    array('status'=>'S2', 'salary_range'=> 41.67, 'percent_over' => 0.10, 'tax' => 9167, 'salary_type' => 'm'),
		    array('status'=>'S3', 'salary_range'=> 41.67, 'percent_over' => 0.10, 'tax' => 11250, 'salary_type' => 'm'),
		    array('status'=>'S4', 'salary_range'=> 41.67, 'percent_over' => 0.10, 'tax' => 13333, 'salary_type' => 'm'),

		    array('status'=>'S', 'salary_range'=> 208.33, 'percent_over' => 0.15, 'tax' => 6667, 'salary_type' => 'm'),
		    array('status'=>'S1', 'salary_range'=> 208.33, 'percent_over' => 0.15, 'tax' => 8750, 'salary_type' => 'm'),
		    array('status'=>'S2', 'salary_range'=> 208.33, 'percent_over' => 0.15, 'tax' => 10833, 'salary_type' => 'm'),
		    array('status'=>'S3', 'salary_range'=> 208.33, 'percent_over' => 0.15, 'tax' => 12917, 'salary_type' => 'm'),
		    array('status'=>'S4', 'salary_range'=> 208.33, 'percent_over' => 0.15, 'tax' => 15000, 'salary_type' => 'm'),

		    array('status'=>'S', 'salary_range'=> 708.33, 'percent_over' => 0.20, 'tax' => 10000, 'salary_type' => 'm'),
		    array('status'=>'S1', 'salary_range'=> 708.33, 'percent_over' => 0.20, 'tax' => 12083, 'salary_type' => 'm'),
		    array('status'=>'S2', 'salary_range'=> 708.33, 'percent_over' => 0.20, 'tax' => 14167, 'salary_type' => 'm'),
		    array('status'=>'S3', 'salary_range'=> 708.33, 'percent_over' => 0.20, 'tax' => 16250, 'salary_type' => 'm'),
		    array('status'=>'S4', 'salary_range'=> 708.33, 'percent_over' => 0.20, 'tax' => 18333, 'salary_type' => 'm'),

		    array('status'=>'S', 'salary_range'=> 1875.00, 'percent_over' => 0.25, 'tax' => 15833, 'salary_type' => 'm'),
		    array('status'=>'S1', 'salary_range'=> 1875.00, 'percent_over' => 0.25, 'tax' => 17917, 'salary_type' => 'm'),
		    array('status'=>'S2', 'salary_range'=> 1875.00, 'percent_over' => 0.25, 'tax' => 20000, 'salary_type' => 'm'),
		    array('status'=>'S3', 'salary_range'=> 1875.00, 'percent_over' => 0.25, 'tax' => 22083, 'salary_type' => 'm'),
		    array('status'=>'S4', 'salary_range'=> 1875.00, 'percent_over' => 0.25, 'tax' => 24167, 'salary_type' => 'm'),

		    array('status'=>'S', 'salary_range'=> 4166.67, 'percent_over' => 0.30, 'tax' => 25000, 'salary_type' => 'm'),
		    array('status'=>'S1', 'salary_range'=> 4166.67, 'percent_over' => 0.30, 'tax' => 27083, 'salary_type' => 'm'),
		    array('status'=>'S2', 'salary_range'=> 4166.67, 'percent_over' => 0.30, 'tax' => 29167, 'salary_type' => 'm'),
		    array('status'=>'S3', 'salary_range'=> 4166.67, 'percent_over' => 0.30, 'tax' => 31250, 'salary_type' => 'm'),
		    array('status'=>'S4', 'salary_range'=> 4166.67, 'percent_over' => 0.30, 'tax' => 33333, 'salary_type' => 'm'),

		    array('status'=>'S', 'salary_range'=> 10416.67, 'percent_over' => 0.32, 'tax' => 45833, 'salary_type' => 'm'),
		    array('status'=>'S1', 'salary_range'=> 10416.67, 'percent_over' => 0.32, 'tax' => 47917, 'salary_type' => 'm'),
		    array('status'=>'S2', 'salary_range'=> 10416.67, 'percent_over' => 0.32, 'tax' => 50000, 'salary_type' => 'm'),
		    array('status'=>'S3', 'salary_range'=> 10416.67, 'percent_over' => 0.32, 'tax' => 52083, 'salary_type' => 'm'),
		    array('status'=>'S4', 'salary_range'=> 10416.67, 'percent_over' => 0.32, 'tax' => 54167, 'salary_type' => 'm'),
		);

		return $data;
    }
}
