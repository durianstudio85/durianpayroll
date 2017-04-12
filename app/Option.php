<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Company;
use Auth;
use App\Options\Company_user;
use App\Options\Benefits\Benefit;
use App\Options\Tax;

class Option extends Model
{
    protected $fillable = [
        'company_id', 
        'name', 
        'slug', 
        'value', 
        'category', 
    ];

    public function philhealth($value='')
    {
        # code...
    }

    public static function comID()
    {
        $userId = Auth::user()->id;
        $getComId = Company_user::where('user_id', '=', $userId)->first();
        return $getComId->company_id;
    }
    
    
    public static function getCurrentOption($cat='')
    {
    	$comID = Option::comID();
    	$company_option = Option::where('company_id', '=', $comID )->where('category', '=', $cat )->get();
    	return $company_option;
    }


    public static function optionDetails($id='')
    {
    	$comID = Option::comID();
    	$getDetail = Option::where('company_id', '=', $comID)->where('id', '=', $id)->first();
    	return $getDetail;
    }


    public static function salaryTax($salary='', $stat ='')
    {
        $benefit = new Benefit;

        $philhealth = $benefit->getPhilhealth($salary);
        $sss = $benefit->getSSS($salary);
        $totalDeduction = $sss + $philhealth;
        $totalSalaryDeduction = $salary - $totalDeduction;

        $taxData = Tax::where('status','=',$stat)->where('tax', '<=', $salary)->where('salary_type', '=', 'm')->orderBy('tax', 'desc')->first();
        $taxDeduction = $totalSalaryDeduction - $taxData->tax;
        $getPercent = $taxDeduction * $taxData->percent_over;
        $totalTax = $taxData->salary_range + $getPercent ;

           // 1,875 + [(24,006.20-17,917) X .25]



        return $totalTax;
    }





















    public static function TaxStatus()
    {
        $data =[
            'S' => 'Single',
            'ME' => 'Married',
            'S1' => 'Single w/ 1 Dependent',
            'S2' => 'Single w/ 2 Dependents',
            'S3' => 'Single w/ 3 Dependents',
            'S4' => 'Single w/ 4 Dependents',
            'ME1' => 'Married w/ 1 Dependent',
            'ME2' => 'Married w/ 2 Dependents',
            'ME3' => 'Married w/ 3 Dependents',
            'ME4' => 'Married w/ 4 Dependents',
        ];
        return $data;
    }

}

