<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Employee;


class PayslipController extends Controller
{
    public function __construct()
    {
        $this->middleware('employee');
    }
    
    public function index()
    {
    	$id = auth()->guard('employee')->user()->id;
    	$employee = Employee::find($id);
    	
    	return view('employee.payslip', compact('employee'));
    }
}
