<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Options\Company_user;
use App\Options\Benefits\Benefit;
use App\Company;
use App\Employee;
use App\User;
use App\Option;
use Auth;
use Mail;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = new Company;
        $benefit = new Benefit;
        $comId = $company->getComId();
        $employee = Employee::where('company_id', '=', $comId)->get();
        return view('admin.employees', compact('employee', 'benefit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company;
        $comId = $company->getComId();

        $current_user = Auth::User()->id;

        $getEmailValidation = Employee::where('email','=', $request->get('email'))->count();
        if ($getEmailValidation > 0) {
            session()->flash('flash_message', 'Email Already Exist!');
            session()->flash('flash_message_important', 'alert-danger');
        }else{
            if ($request->get('position') == 'new') {
                if ( !empty($request->get('other_position')) ) {
                    $slug = str_slug($request->get('other_position'), '-');
                    $optionData=[
                        'company_id' => $comId,
                        'name' => $request->get('other_position'),
                        'slug' => $slug,
                        'category' => 'position',
                    ];
                    $option = Option::create($optionData);

                    $employeeData = [
                        'company_id' => $comId,
                        'employee_id' => $request->get('employee_id'),
                        'last_name' => $request->get('last_name'),
                        'first_name' => $request->get('first_name'),
                        'middle_name' => $request->get('middle_name'),
                        'gender' => $request->get('gender'),
                        'status' => $request->get('status'),
                        'email' => $request->get('email'),
                        'position' => $option->id,
                        'mobile_no' => $request->get('mobile_no'),
                        'basic_pay' => $request->get('basic_pay'),
                    ];    
                    $employee = Employee::create($employeeData);

                    session()->flash('flash_message', 'Employee Added Successfully..');
                    session()->flash('flash_message_important', 'alert-success');
                }else{
                    session()->flash('flash_message', 'Select or Add Position!');
                    session()->flash('flash_message_important', 'alert-danger');
                }
            }else{
                $employeeData = [
                    'company_id' => $comId,
                    'employee_id' => $request->get('employee_id'),
                    'last_name' => $request->get('last_name'),
                    'first_name' => $request->get('first_name'),
                    'middle_name' => $request->get('middle_name'),
                    'gender' => $request->get('gender'),
                    'status' => $request->get('status'),
                    'email' => $request->get('email'),
                    'position' => $request->get('position'),
                    'mobile_no' => $request->get('mobile_no'),
                    'basic_pay' => $request->get('basic_pay'),
                ];    
                $employee = Employee::create($employeeData);

                session()->flash('flash_message', 'Employee Added Successfully..');
                session()->flash('flash_message_important', 'alert-success');
            }
            // Mail::send('emails.reminder', compact('user', 'pass'), function ($m) use ($user) {
            //     $m->from('no-reply@durianpayroll.com', 'No Reply');
            //     $m->to('jaybeeumbay159@outlook.com', 'Jaabee')->subject('Account Details.');
            // });
            
        }

        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $company = new Company;
        $comId = $company->getComId();

        $employee = Employee::findOrFail($id);
        $current_user = Auth::User()->id;

        if ($employee->email != $request->get('email') ) {
            $getEmailValidation = Employee::where('email','=', $request->get('email'))->count();    
        }else{
            $getEmailValidation = 0;
        }

        
        if ($getEmailValidation > 0) {
            session()->flash('flash_message', 'Email Already Exist!');
            session()->flash('flash_message_important', 'alert-danger');
        }else{
            if ($request->get('position') == 'new') {
                if ( !empty($request->get('other_position')) ) {
                    $slug = str_slug($request->get('other_position'), '-');
                    $optionData=[
                        'company_id' => $comId,
                        'name' => $request->get('other_position'),
                        'slug' => $slug,
                        'category' => 'position',
                    ];
                    $option = Option::create($optionData);

                    $employeeData = [
                        'company_id' => $comId,
                        'employee_id' => $request->get('employee_id'),
                        'last_name' => $request->get('last_name'),
                        'first_name' => $request->get('first_name'),
                        'middle_name' => $request->get('middle_name'),
                        'gender' => $request->get('gender'),
                        'status' => $request->get('status'),
                        'email' => $request->get('email'),
                        'position' => $option->id,
                        'mobile_no' => $request->get('mobile_no'),
                        'basic_pay' => $request->get('basic_pay'),
                    ];    
                    $employee->update($employeeData);

                    session()->flash('flash_message', 'Employee Updated Successfully..');
                    session()->flash('flash_message_important', 'alert-success');
                }else{
                    session()->flash('flash_message', 'Select or Add Position!');
                    session()->flash('flash_message_important', 'alert-danger');
                }
            }else{
                $employeeData = [
                    'company_id' => $comId,
                    'employee_id' => $request->get('employee_id'),
                    'last_name' => $request->get('last_name'),
                    'first_name' => $request->get('first_name'),
                    'middle_name' => $request->get('middle_name'),
                    'gender' => $request->get('gender'),
                    'status' => $request->get('status'),
                    'email' => $request->get('email'),
                    'position' => $request->get('position'),
                    'mobile_no' => $request->get('mobile_no'),
                    'basic_pay' => $request->get('basic_pay'),
                ];    
                $employee->update($employeeData);

                session()->flash('flash_message', 'Employee Updated Successfully..');
                session()->flash('flash_message_important', 'alert-success');
            }
            // Mail::send('emails.reminder', compact('user', 'pass'), function ($m) use ($user) {
            //     $m->from('no-reply@durianpayroll.com', 'No Reply');
            //     $m->to('jaybeeumbay159@outlook.com', 'Jaabee')->subject('Account Details.');
            // });
            
        }

        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
