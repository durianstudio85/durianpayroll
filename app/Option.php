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
use App\Loan;

class Option extends Model
{
    protected $fillable = [
        'company_id', 
        'name', 
        'slug', 
        'value', 
        'category', 
    ];

    public static function employeeName($id='')
    {
        $name = Employee::find($id);
        return $name;
    }

    public static function convertDate($timestemp='')
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestemp);
        return $date;
        // Year, Month, Day
    }
    

    public static function comID()
    {
        $userId = Auth::user()->id;
        $getComId = Company_user::where('user_id', '=', $userId)->first();
        return $getComId->company_id;
    }
    
    
    public static function comDetails($value='')
    {
        $company = new Company;
        $comId = $company->getComId();
        $company_detail = Company::find($comId);
        return $company_detail->$value;
    }
    
    public static function employeeDetails($id='')
    {
        $employee = Employee::find($id);
        return $employee;
    }
    
    
    public static function payrollDet($id='')
    {
        $payroll = Payroll::find($id);
        return $payroll;
    
    }
    // public function benefits($basic_pay='', $type ='')
    // {
    //     $benefit = new Benefit;
    //     if ( $type == 'philhealth') {
    //         return $benefit->getPhilhealth($basic_pay);
    //     }else{
    //         return $benefit->getSSS($basic_pay);    
    //     }
    // }
    
    
    public static function loan($id='')
    {
        $amount = 0;
        
        $loan = Employee::find($id)->loans()->where('date_start','<=',date('Y-m-d'))->where('status','=',1002)->first();   
        if ( !empty($loan)) {
            $amount = $loan->amount_per_day;
        }
        
        return $amount;
     
    }
    
    
    public static function totalLoanBalance($id='')
    {
        $loan = Loan::find($id);
        $total = 0;
        foreach ($loan->loan_items as $list) {
            $total += $list->amount;
        }
        
        return $loan->total_payment - $total;
    }
    
    
    
    
    
    
    

    public static function allEmployeeList(){
        
        $comId = Auth::user()->company_user->company_id;
        // $company = new Company;
        // $comId = $company->getComId();
        $company = Company::find($comId)->employees;
        // $employee = Employee::where('company_id', '=', $comId)->get();
        return $company;
    }
    

    public static function Benefits()
    {
        $benefit = new Benefit;
        return $benefit;
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


    public static function tax($income='', $stat='')
    {
        // $comSalaryType = Auth::user()->company_user()->salary_type;
        $comID = Option::comID();
        $salary_type = Company::find($comID)->salary_type;
        $tax = Tax::where('salary_range','<=', $income)->where('status','=', $stat)->where('salary_type','=', $salary_type)->orderBy('salary_range', 'desc')->first();
        
        $totalTax = 0;
        
        if ( !empty($tax) ) {
            $tax_child_1 = $income - $tax->salary_range;
            $tax_child_2 = $tax_child_1 * $tax->percent_over;
            $tax_child_3 = $tax->tax + $tax_child_2;
            
            return $tax_child_3;
        }else{
            return $totalTax; 
        }
    }

    public static function salaryTax($salary = '', $stat = '')
    {
        
        $taxData = Tax::where('status','=', $stat)->where('tax', '<=', $salary)->where('salary_type', '=', 'm')->orderBy('tax', 'desc')->first();
        $sss = Option::Benefits()->getSSS($salary);
        $philhealth = Option::Benefits()->getPhilhealth($salary);
        $pagibig = 100;
        
        $benefits = $sss + $philhealth + $pagibig;
        $totalSalaryDeduction = $salary - $benefits;
        
        
        if ( empty($taxData)) {
            $totalTax = count($taxData);
        }else{
            $taxDeduction = $totalSalaryDeduction - $taxData->tax;
            $getPercent = $taxDeduction * $taxData->percent_over;
            $totalTax = $taxData->salary_range + $getPercent ;    
        }
           // 1,875 + [(24,006.20-17,917) X .25]

        return $totalTax;
    }


    public static function getPayrollItems($id='')
    {
        $company = new Company;
        $comId = $company->getComId();
        $payroll_item = Payroll_item::where('payroll_id','=', $id)->where('company_id', '=', $comId)->get();
        return $payroll_item;
    }


    public static function getNavOption()
    {
        $company = new Company;
        $comId = $company->getComId();

        $getNavOption = Company::find($comId);
        return $getNavOption->nav;
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

