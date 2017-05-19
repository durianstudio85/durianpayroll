<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Options\Tax;
use App\Options\Benefits\Benefit;
use App\Employee;
use App\Company;
use App\Payroll;

class DashboardController extends Controller
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

        $tax = new Tax;
        $benefit = new Benefit;
        $getTax = $tax->InsertTaxFunction();
        $getBenefit = $benefit->InsertBenefitFunction();

        $company = new Company;
        $comID = $company->getComId();

        $countMale = 0;
        $countFemale = 0;

        // For Employee Panel
        $recentEmployee = Employee::where('company_id', '=', $comID)->skip(0)->take(5)->orderBy('created_at','desc')->get();
        $lastEmployeeUpdate = Employee::where('company_id', '=', $comID)->orderBy('updated_at', 'desc')->first();

        // Count Employee in Pie
        $countMale = Employee::where('company_id', '=', $comID)->where('gender', '=', 'male')->count();
        $countFemale = Employee::where('company_id', '=', $comID)->where('gender', '=', 'female')->count();

        if ($countMale == 0 AND $countFemale == 0) {
            $percentMale = 0;
            $percentFemale = 0;
        }else{
            $percentMale =  ($countMale / ($countMale + $countFemale)) * 100;
            $percentFemale =  ($countFemale / ($countMale + $countFemale)) * 100;    
        }
        

        //Summary Report in Dashboard
        $summaryPayrollCount = Payroll::where('company_id', '=', $comID)->count();
        $summaryEmployeeCount = Employee::where('company_id', '=', $comID)->count();

        return view('admin.dashboard', compact('recentEmployee', 'lastEmployeeUpdate', 'countMale', 'countFemale', 'percentMale', 'percentFemale', 'summaryPayrollCount', 'summaryEmployeeCount'));
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
        //
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
