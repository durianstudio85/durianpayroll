<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Employee;
use App\Payroll;
use App\Payroll_item;
use App\Company;
use App\Time_record;
use Carbon\Carbon;


class EmployeeAccController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('employee');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function payslip()
    {
        $id = auth()->guard('employee')->user()->id;
        $company = new Company;
        
        $time = Time_record::where('employee_id','=', $id)->where('timeout','=', '00:00:00')->first();
        
        $myPayslip = Payroll_item::where('employee_id', '=', $id)->get();
        return view('employee.payslip', compact('myPayslip', 'company', 'id', 'time'));
    }
    
    
    
    public function setting()
    {
        $id = auth()->guard('employee')->user()->id;
        $myProfile = Employee::findOrFail($id);
        return view('employee.setting', compact('myProfile'));
    }
    
    public function loan()
    {
        $id = auth()->guard('employee')->user()->id;
        $employee = Employee::find($id);
        return view('employee.loan', compact('employee'));
    }
    
    public function applyLoan(Request $request)
    {
        $id = auth()->guard('employee')->user()->id;
        $company_id = auth()->guard('employee')->user()->company_id;
        
        $amountPayment = $request->amount / $request->no_of_payments;
        
        $loanData = [
            'company_id' => $company_id,
            'date_start' => $request->date_start,
            'total_payment' => $request->amount,
            'no_of_pay' => $request->no_of_payments,
            'amount_per_pay' => $amountPayment,
            'status' => 1001,
        ];
        
        $employee = Employee::find($id)->loans()->create($loanData);
        
        // $employee->loan->create($loanData);
        
        session()->flash('flash_message', 'Loan Added Successfully');
        session()->flash('flash_message_important', 'alert-success');
        
        return redirect('/employee/loans');
    }
    
    public function timeIn(Request $request)
    {
        $id = auth()->guard('employee')->user()->id;
        $company_id = auth()->guard('employee')->user()->company_id;
        
        $now = Carbon::now();

        $data = [
            'timein'=> Carbon::now('Asia/Manila'),
            'employee_id' => $id,
            'company_id' => $company_id,
        ];
        
        $inTime = Time_record::create($data);
        return redirect('/employee');
    }
    
    public function timeOut(Request $request, $id)
    {
        $time = Time_record::find($id);
        
        $data = [
            'timeout' => Carbon::now('Asia/Manila'),
        ];
        
        $outTime = $time->update($data);
        return redirect('/employee');
    }
    
    public function settingUpdate($id)
    {
        // $id = Auth::employee()->id;
        
    }
    
    // functions only
    
    
}
