<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Activation_code;
use App\Company;

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
    
    public function employeeReg($token)
    {
        
        $activation = Activation_code::where('token_code', '=', $token)->where('status', '=', 'active')->first();
        
        if (!empty($activation)) {
            $getCompany = Company::find($activation->company_id);
            
            return view('auth.employee.register',compact( 'token', 'getCompany', 'activation'));
        }else{
            return redirect('/');
        }
        
    }
}
