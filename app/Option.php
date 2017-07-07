<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Company;
use Auth;
use App\Options\Company_user;
use App\Options\Benefits\Benefit;
use App\Options\Tax;

use App\Employee;
use App\Payroll_item;

use Carbon\Carbon;
use App\Payroll;

class Option extends Model
{
    protected $fillable = [
        'company_id', 
        'name', 
        'slug', 
        'value', 
        'category', 
    ];



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
    
    
    public static function company()
    {
        $company = Auth::user()->company;
        return $company;
    }
    
    public static function selectPositions()
    {
        $comId = Auth::user()->company->id;
        $position = Company::find($comId)->positions->lists('name','id');
        return $position;
    }
    
    
    public static function positionDet($id='')
    {
        $comId = Auth::user()->company->id;
        $position = Company::find($comId)->position->find($id);
        return $position->name;
    }
    
    
    public static function salaryTax($salary = '', $stat = '')
    {
        
        $taxData = Tax::where('status','=', $stat)->where('tax', '<=', $salary)->where('salary_type', '=', 'm')->orderBy('tax', 'desc')->first();
        $sss = Option::Benefits()->getSSS($salary);
        $philhealth = Option::Benefits()->getPhilhealth($salary);
        $pagibig = Option::Benefits()->getPagibig($salary);
        
        $benefits = $sss + $philhealth + $pagibig;
        $totalSalaryDeduction = $salary - $benefits;
        
        
        // if ( empty($taxData)) {
        //     $totalTax = count($taxData);
        // }else{
            $taxDeduction = $totalSalaryDeduction - $taxData->tax;
            $getPercent = $taxDeduction * $taxData->percent_over;
            $totalTax = $taxData->salary_range + $getPercent ;    
        // }
           // 1,875 + [(24,006.20-17,917) X .25]

        return $totalTax;
    }
    
    
    public static function Benefits()
    {
        $benefit = new Benefit;
        return $benefit;
    }

}

