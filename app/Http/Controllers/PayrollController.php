<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Company;
use App\Employee;
use App\Options\Benefits\Benefit;
use App\Payroll;
use App\Payroll_item;
use App\Option;

class PayrollController extends Controller
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
        $payroll = Payroll::where('company_id', '=', $comId)->get();

        return view('admin.payroll', compact('payroll'));

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

        $benefit = new Benefit;
        $company = new Company;
        $comId = $company->getComId();

        $paypal_data = [
            'company_id' => $comId,
            'date_start_range' => $request->get('date_start'),
            'date_end_range' => $request->get('date_end'),
            'status' => 'Unpaid',
        ];

        $paypal = Payroll::create($paypal_data);

        foreach ($request->employee_id as $key => $value) {
            $employee = Employee::find($request->employee_id[$key]);

            $basic_pay = $employee->basic_pay;
            $sss = $benefit->getSSS($employee->basic_pay);
            $pagibig = 100;
            $philhealth = $benefit->getPhilhealth($employee->basic_pay);
            $tax = Option::salaryTax($employee->basic_pay, $employee->status);

            $total_pay = $employee->basic_pay - ($sss + $pagibig + $philhealth + $tax + $request->deductions[$key]);

            $data = [
                'company_id' => $comId,
                'payroll_id' => $paypal->id,
                'basic_pay' => $employee->basic_pay,
                'sss' => $sss,
                'pagibig' => $pagibig,
                'philhealth' => $philhealth,
                'tax' => $tax,
                'total_pay' => $total_pay,
                'employee_id' => $request->employee_id[$key],
                
                'overtime' => $request->overtime[$key],
                'night_differential' => $request->night_differential[$key],
                'double_pay' => $request->double_pay[$key],
                'holiday' => $request->holiday[$key],
                'bonus' => $request->bonus[$key],
                
                'loans' => $request->loans[$key],
                'absent' => $request->absent[$key],
                'others' => $request->others[$key],
                
            ];

            Payroll_item::create($data);
        }

        session()->flash('flash_message', 'Payroll Created Successfully..');
        session()->flash('flash_message_important', 'alert-success');

        return redirect('/payroll');
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
        if ( isset($request->status) ) {
            $payrollParent = Payroll::findOrFail($id);
            $payrollParentData = [
                'status' => $request->status,
            ];    
            $payrollParent->update($payrollParentData);
            
            session()->flash('flash_message', 'Payroll Updated Successfully..');
            session()->flash('flash_message_important', 'alert-success');
        }else{
            $payrollItems = Payroll_item::findOrFail($request->child_id);
            $employee = Employee::findOrFail($payrollItems->employee_id);
            
            // Total Earnings 
            $basic_pay = $employee->basic_pay;
            $overtime = $request->overtime;
            $night_diff = $request->night_differential;
            $double_pay = $request->double_pay;
            $holiday = $request->holiday;
            $bonus = $request->bonus;
            
            // Deductions 
            $sss = Option::Benefits()->getSSS($employee->basic_pay);
            $philhealth = Option::Benefits()->getPhilhealth($employee->basic_pay);
            $pagibig = $payrollItems->pagibig;
            $loans = $request->loans;
            $others = $request->others;
            $absent = $request->absent;
            
            
            
            
            
            $totalEarnings = ($basic_pay + $overtime + $night_diff + $double_pay + $holiday + $bonus) - ( $request->absent + $sss + $philhealth + $pagibig + $others);
                        
            $totalTaxSalary = Option::salaryTax($totalEarnings, $employee->status);
            
            $total_pay  = ($basic_pay + $overtime + $night_diff + $double_pay + $holiday + $bonus) - ( $sss + $pagibig + $philhealth + $absent + $others + $loans + $totalTaxSalary );
            
            $totalDeduction = $totalTaxSalary + $sss + $philhealth + $pagibig + $loans + $others + $absent;
            
            $data = [
                'overtime' => $request->overtime,
                'night_differential' => $request->night_differential,
                'double_pay' => $request->double_pay,
                'holiday' => $request->holiday,
                'absent' => $request->absent,
                'loans' => $request->loans,
                'others' => $request->others,
                'bonus' => $request->bonus,
                'total_pay' => $total_pay,
                'tax' => $totalTaxSalary,
                'deduction' => $totalDeduction,
            
            ];
            
            $payrollItems->update($data);
            
            session()->flash('parent_modal_flash_message', $request->parent_id);
            session()->flash('child_modal_flash_message', 'Employee payslip updated Successfully');
            
        }   
            

        // foreach ($request->employee_id as $key => $value) {
        //     $payrollChild = Payroll_item::findOrFail($request->employee_id[$key]);

        //     $total_pay = $payrollChild->basic_pay - ($payrollChild->sss + $payrollChild->pagibig + $payrollChild->philhealth + $payrollChild->tax + $request->deductions[$key]);

        //     $payrollChilData = [
        //         'deduction' => $request->deductions[$key],
        //         'total_pay' => $total_pay,
        //     ];
        //     $payrollChild->update($payrollChilData);
        // }
        
        return redirect('/payroll');
    }
    
    
    public function updatePayrollItem(Request $request, $id)
    {
        foreach ($variable as $key => $value) {
            # code...
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payroll::destroy($id);

        $payrollItems = Payroll_item::where('payroll_id', '=', $id)->get();

        foreach ($payrollItems as $item) {
            Payroll_item::destroy($item->id);
        }

        session()->flash('flash_message', 'Payroll has been Removed Successfully!');
        session()->flash('flash_message_important', 'alert-success');
        return redirect('/payroll');
    }
}
