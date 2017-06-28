<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Company;
use App\Loan;
use Auth;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$comId = Auth::user()->company_user->company_id;
        $loans = Company::find($comId)->loans;

    	
    	return view('admin.loan', compact('loans')); 
    }
    
    public function update(Request $request, $id)
    {
        $loan = Loan::find($id);
        
        $data = [
        	'total_payment' => $request->total_payment,
        	'no_of_pay' => $request->no_of_pay,
        	'amount_per_pay' => $request->amount_per_pay,
        	'status' => $request->status,
        ];
        
        $loan->update($data);
        
        session()->flash('flash_message', 'Loan Updated Successfully');
        session()->flash('flash_message_important', 'alert-success');
        
        return redirect('loans');
    	
    }
}
