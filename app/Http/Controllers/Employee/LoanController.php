<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Employee;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('employee');
    }
    
    public function index()
    {
    	$id = auth()->guard('employee')->user()->id;
        $employee = Employee::find($id);
        return view('employee.loan', compact('employee'));
    }
    
    public function store(Request $request)
    {
    	
    	$id = auth()->guard('employee')->user()->id;
        $company_id = auth()->guard('employee')->user()->company_id;
        
        if (empty( $request->no_of_payments )) {
        	$amountPayment = $request->amount_per_pay;
        }else{
        	$amountPayment = $request->amount / $request->no_of_payments;	
        }
        
        
        $loanData = [
            'company_id' => $company_id,
            'date_start' => $request->date_start,
            'loan_amount' => $request->amount,
            'amount_per_pay' => $amountPayment,
            'status' => 1,
        ];
        
        $employee = Employee::find($id)->loans()->create($loanData);
        
        // $employee->loan->create($loanData);
        
        session()->flash('flash_message', 'Loan Added Successfully');
        session()->flash('flash_message_important', 'alert-success');
        
        return redirect('/employee/loans');
    }
}
