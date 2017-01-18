<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Options\Company_user;
use App\Options\Pay_type;
use App\Employee;
use App\Company;
use App\Adjustment;
use App\User;
use Auth;


class PayAdjustmentController extends Controller
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

        $user = new User;
        $userInfo = $user->getUser();
        
        $end = Carbon::parse('2017-01-19');
        $now = Carbon::now();
        $difference = $now->diffInDays($end);

        


        $company_user_list = Company_user::where('company_id', '=', $comId)->get();
        $items = array();
        foreach($company_user_list as $company_user) {
            $items[] = $company_user->user_id;
        }
        $employee_list = Employee::whereIn('user_id', $items)->get();
        
        $employee_adjustment = Adjustment::whereIn('employee_id', $items)->get();
        $pay_type_list = Pay_type::lists('type', 'id');
        $getPayType = Pay_type::get();
        $payTypeItems = [];
        foreach ($getPayType as $PayType) {
            $payTypeItems[$PayType->id] = $PayType->type;
        }

        return view('pages.employee.pay-adjustment', compact('employee_list', 'pay_type_list', 'employee_adjustment', 'payTypeItems', 'userInfo', 'difference' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = [
            'employee_id' => $request->get('employee_id'),
            'basic_pay' => $request->get('basic_pay'),
            'rate_type' => $request->get('rate_type'),
            'effective_date' => $request->get('effective_date'),
            'adjustment_date' => $request->get('adjustment_date'),
            'adjustment_reason' => $request->get('adjustment_reason'),
            'created_by' => Auth::User()->id,
        ];
        Adjustment::create($data);

         

        session()->flash('flash_message', 'Employee Pay Adjustment Added Successfully..');
        session()->flash('flash_message_important', 'alert-success');

        return redirect('/payAdjustment');
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
