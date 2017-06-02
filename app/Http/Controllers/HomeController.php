<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('landingpage');
    }
    
    public function email()
    {
        return view('emails.reminder');
    }
    
    public function employeeReg($token, $company_name)
    {
        return view('auth.employee.register',compact('company_name', 'token'));
    }
}
