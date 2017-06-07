<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Employee;


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
        return view('employee.payslip');
    }
    
    public function setting()
    {
        // $id = Auth::employee()->id;
        
        $id = auth()->guard('employee')->user()->id;
        $myProfile = Employee::findOrFail($id);
        return view('employee.setting', compact('myProfile'));
    }
    
    public function settingUpdate($id)
    {
        // $id = Auth::employee()->id;
        
    }
}
