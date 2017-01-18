<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Options\Company_user;
use App\Company;
use App\Employee;
use App\User;
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
        $comId = $company->getComId();

        $company_user_list = Company_user::where('company_id', '=', $comId)->get();
        $items = array();
        foreach($company_user_list as $company_user) {
            $items[] = $company_user->user_id;
        }
        $employee_list = Employee::whereIn('user_id', $items)->get();
        return view('pages.employee.employee-201', compact('employee_list'));
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

        $current_user = Auth::User()->id;

        $getEmailValidation = User::where('email','=', $request->get('email'))->count();
        if ($getEmailValidation > 0) {
            session()->flash('flash_message', 'Email Already Exist!');
            session()->flash('flash_message_important', 'alert-danger');
        }else{
             $company = new Company;
            $comId = $company->getComId();

            $pass = str_random(5);
            $userData = [
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'password' => bcrypt($pass)
            ];
            $user = User::create($userData);
            $employeeData = [
                'user_id' => $user->id,
                'employee_id' => $request->get('employee_id'),
                'last_name' => $request->get('last_name'),
                'first_name' => $request->get('first_name'),
                'middle_name' => $request->get('middle_name'),
                'gender' => $request->get('gender'),
                'email' => $request->get('email'),
                'telephone_no' => $request->get('telephone_no'),
                'mobile_no' => $request->get('mobile_no'),
                'created_by' => $current_user,
            ];
            $employee = Employee::create($employeeData);

            $connect = Company_user::create([
                'user_id' => $user->id,
                'company_id' => $comId,
            ]);

            Mail::send('emails.reminder', compact('user', 'pass'), function ($m) use ($user) {
                $m->from('no-reply@durianpayroll.com', 'No Reply');
                $m->to('jaybeeumbay159@outlook.com', 'Jaabee')->subject('Account Details.');
            });

            session()->flash('flash_message', 'Employee Added Successfully..');
            session()->flash('flash_message_important', 'alert-success');
        }

        return redirect('/employee-201');
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
        //
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
