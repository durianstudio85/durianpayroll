<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\Options\Benefits\Benefit;
use App\Option;
use App\Payroll;
use App\Payroll_item;

class PayrollController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
    }
	    
	public function index()
    {
    	$company = Auth::user()->company;
    	return view('admin.payroll', compact('company'));
    }
    
    public function store(Request $request)
    {
    	$this->validate($request, [
            'date_start' => 'required|max:255',
            'cycle_type' => 'required|max:255',
	    ]);
    	
    	$company = Auth::user()->company;
    	$benefit = new Benefit;
    	$MyDateStartCarbon = Carbon::parse($request->get('date_start'));
    	
    	$payroll_data = [
            'date_start_range' => $request->get('date_start'),
            'date_end_range' => $MyDateStartCarbon->addDays(14),
            'cycle_type' => $request->get('cycle_type'),
            'status' => 'Unpaid',
        ];
        
        $payroll = $company->payrolls()->create($payroll_data);
    	
    	foreach ($request->employee_id as $key => $value) {
            $employee = $company->employees()->find($request->employee_id[$key]);
            
            // Total Earnings
            $basic_pay = $employee->basic_pay / 2;
            $overtime = $request->overtime[$key];
            $night_diff = $request->night_differential[$key];
            $double_pay = $request->double_pay[$key];
            $holiday = $request->holiday[$key];
            $bonus = $request->bonus[$key];
            
            // Total Deductions
            $sss = $benefit->getSSS($basic_pay) / 2;
            $philhealth = $benefit->getPhilhealth($basic_pay) / 2;
            $pagibig = $benefit->getPagibig($basic_pay) / 2;
            $loans = $request->loans[$key];
            $others = $request->others[$key];
            $absent = $request->absent[$key];
            
            
            $totalEarnings = ($basic_pay + $overtime + $night_diff + $double_pay + $holiday + $bonus) - ( $absent + $sss + $philhealth + $pagibig + $others);
            $basic_pay_divided = $basic_pay / 2;
            
            $totalTaxSalary = Option::salaryTax($employee->basic_pay, $employee->status);
            
            // $totalTaxSalary = Option::tax($totalEarnings, $employee->status);
            
            $total_pay  = ($basic_pay + $overtime + $night_diff + $double_pay + $holiday + $bonus) - ( $sss + $pagibig + $philhealth + $absent + $others + $loans + $totalTaxSalary );
            $totalDeduction = $totalTaxSalary + $sss + $philhealth + $pagibig + $loans + $others + $absent;
            
            $data = [
                'company_id' => $company->id,
                'employee_id' => $employee->id,
                'basic_pay' => $employee->basic_pay / 2 ,
                
                //Income 
                'overtime' => $request->overtime[$key],
                'night_differential' => $request->night_differential[$key],
                'double_pay' => $request->double_pay[$key],
                'holiday' => $request->holiday[$key],
                'bonus' => $request->bonus[$key],
                
                // Total Deductions
                'sss' => $sss,
                'pagibig' => $pagibig,
                'philhealth' => $philhealth,
                'tax' => $totalTaxSalary,
                'loans' => $loans,
                'absent' => $request->absent[$key],
                'others' => $request->others[$key],                
                
                'deduction' => $totalDeduction,
                'total_pay' => $total_pay,
            ];

            $payroll->payroll_items()->create($data);
    	}
    	
    	session()->flash('flash_message', 'Payroll Created Successfully..');
        session()->flash('flash_message_important', 'alert-success');

        return redirect('/payroll');
    }
    
    
    
    
    public function updateItems(Request $request, $id)
    {
    	$company = Auth::user()->company;
        $benefit = new Benefit;
        
        $item = $company->payroll_items()->find($id);
        $employee = $item->employee;
        
        
        $basic_pay = $employee->basic_pay / 2;
        $overtime = $request->overtime;
        $night_diff = $request->night_differential;
        $double_pay = $request->double_pay;
        $holiday = $request->holiday;
        $bonus = $request->bonus;
        
        // Total Deductions
        $sss = $benefit->getSSS($basic_pay) / 2;
        $philhealth = $benefit->getPhilhealth($basic_pay) / 2;
        $pagibig = $benefit->getPagibig($basic_pay) / 2;
        $loans = $request->loans;
        $others = $request->others;
        $absent = $request->absent;
        
        
        $totalEarnings = ($basic_pay + $overtime + $night_diff + $double_pay + $holiday + $bonus) - ( $absent + $sss + $philhealth + $pagibig + $others);
        // $basic_pay_divided = $basic_pay / 2;
        
        $totalTaxSalary = Option::salaryTax($employee->basic_pay, $employee->status);
        
        // $totalTaxSalary = Option::tax($totalEarnings, $employee->status);
        
        $total_pay  = ($basic_pay + $overtime + $night_diff + $double_pay + $holiday + $bonus) - ( $sss + $pagibig + $philhealth + $absent + $others + $loans + $totalTaxSalary );
        $totalDeduction = $totalTaxSalary + $sss + $philhealth + $pagibig + $loans + $others + $absent;
        
        $data = [
            'basic_pay' => $employee->basic_pay / 2 ,
            
            //Income 
            'overtime' => $request->overtime,
            'night_differential' => $request->night_differential,
            'double_pay' => $request->double_pay,
            'holiday' => $request->holiday,
            'bonus' => $request->bonus,
            
            // Total Deductions
            'sss' => $sss,
            'pagibig' => $pagibig,
            'philhealth' => $philhealth,
            'tax' => $totalTaxSalary,
            'loans' => $loans,
            'absent' => $request->absent,
            'others' => $request->others,                
            
            'deduction' => $totalDeduction,
            'total_pay' => $total_pay,
        ];
        
        $payslip = $item->update($data);
        
        session()->flash('parent_modal_flash_message', $item->payroll_id);
        session()->flash('child_modal_flash_message', 'Employee payslip updated Successfully');
        
        return redirect('/payroll');
        
    }
    
    
    public function update(Request $request, $id)
    {
        $company = Auth::user()->company;
        $payroll = $company->payrolls()->find($id);
        
        $data = [
            'status' => $request->status,
        ];
        
        $done = $payroll->update($data);
        
        session()->flash('flash_message', 'Payroll Created Successfully..');
        session()->flash('flash_message_important', 'alert-success');
        
        return redirect('/payroll');
    }
    
    public function destroy($id)
    {
        $company = Auth::user()->company;
        $payroll = $company->payrolls()->find($id);
        
        foreach ($payroll->payroll_items as $item) {
            Payroll_item::destroy($item->id);
        }        
        
        Payroll::destroy($id);        
        
        session()->flash('flash_message', 'Payroll has been Removed Successfully!');
        session()->flash('flash_message_important', 'alert-success');
        return redirect('/payroll');
    }
    
}
