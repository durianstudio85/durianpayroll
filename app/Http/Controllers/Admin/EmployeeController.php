<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Options\Benefits\Benefit;

use App\Position;

use Mail;

use Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$company = Auth::user()->company;
    	$benefit = new Benefit;
    	
    	return view('admin.employees', compact('company','benefit'));
    }
    
    
    public function store(Request $request)
    {
    	
    	$this->validate($request, [
            'email' => 'required|email|max:255|unique:employees',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'basic_pay' => 'required|max:255',
	    ]);
	    
    	$password = str_random(8);
    	
    	$company = Auth::user()->company;
    	$positionResult = $company->positions()->find($request->position);
    	if (empty($positionResult)) {
    		$slug = str_slug($request->position, '-');
            $optionData=[
                'name' => $request->position,
                'slug' => $slug,
            ];
            $positionData = $company->positions()->create($optionData);
    		
    		$position = $positionData->id;
    	}else{
    		$position = $request->position;
    	}
    	
    	$employeeData = [
            'empID' => $request->get('empID'),
            'last_name' => $request->get('last_name'),
            'first_name' => $request->get('first_name'),
            'middle_name' => $request->get('middle_name'),
            'gender' => $request->get('gender'),
            'status' => $request->get('status'),
            'email' => $request->get('email'),
            'position_id' => $position,
            'mobile_no' => $request->get('mobile_no'),
            'basic_pay' => $request->get('basic_pay'),
            'password' => bcrypt($password),
        ];    
        $employee = $company->employees()->create($employeeData);
    	
    	$this->email = $employee->email;
        $this->first_name = $employee->first_name;
        
        Mail::send('emails.reminder', array('employee' => $employee, 'activation' => $activation, 'password' => $password ), function($message)
        {
            $message->to($this->email, $this->first_name)->subject('Welcome to Durianpayroll');
        });
        
    	session()->flash('flash_message', 'Employee Added Successfully..');
        session()->flash('flash_message_important', 'alert-success');
        
        return redirect('/employees');
    }
    
    
    public function update(Request $request, $id)
    {
    	$company = Auth::user()->company;
    	
    	$positionResult = $company->positions()->find($request->position);
    	if (empty($positionResult)) {
    		$slug = str_slug($request->position, '-');
            $optionData=[
                'name' => $request->position,
                'slug' => $slug,
            ];
            $positionData = $company->positions()->create($optionData);
    		
    		$position = $positionData->id;
    	}else{
    		$position = $request->position;
    	}
    	
    	$employee = $company->employees()->find($id);
        
        $employeeData = [
            'empID' => $request->get('empID'),
            'last_name' => $request->get('last_name'),
            'first_name' => $request->get('first_name'),
            'middle_name' => $request->get('middle_name'),
            'gender' => $request->get('gender'),
            'status' => $request->get('status'),
            'email' => $request->get('email'),
            'position_id' => $position,
            'mobile_no' => $request->get('mobile_no'),
            'basic_pay' => $request->get('basic_pay'),
        ];    
        
        $employee->update($employeeData);
        
        session()->flash('flash_message', 'Employee Added Successfully..');
        session()->flash('flash_message_important', 'alert-success');
        
        return redirect('/employees');
    }
}
