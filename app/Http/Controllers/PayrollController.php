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
use App\Options\Company_user;
use App\User;
use Auth;
use Carbon\Carbon;

use App\Loan;

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
        $comId = Auth::user()->company_user->company_id;
        $payroll = Company::find($comId)->payrolls;
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
        // $comId = $company->getComId();
        $comId = Auth::user()->company_user->company_id;

        $MyDateStartCarbon = Carbon::parse($request->get('date_start'));
        
        // in_array($MyDateStartCarbon->timestamp, $holidays) ||
        
        // while (true) {

        //     // verify date,  not in holiday and is not weekend
        //     if ( $MyDateStartCarbon->isWeekend() ) {

        //         // echo "-- is holiday or weekend ". $MyDateCarbon->toRfc2822String() . " <BR>";

        //         // the day is either in the holidays array or is a weekend
        //         // add one day
        //         $dateStart = $MyDateStartCarbon->addDay();
        //     } else {
        //         // ok, day should be good, exit while
        //         break;
        //     }

        // }
        
        // $request->get('date_end')
        $paypal_data = [
            'company_id' => $comId,
            'date_start_range' => $request->get('date_start'),
            'date_end_range' => $MyDateStartCarbon->addDays(14),
            'cycle_type' => $request->get('cycle_type'),
            'status' => 'Unpaid',
        ];
        

        $paypal = Payroll::create($paypal_data);

        foreach ($request->employee_id as $key => $value) {
            $employee = Employee::find($request->employee_id[$key]);
            
            // Total Earnings
            $basic_pay = $employee->basic_pay / 2;
            $overtime = $request->overtime[$key];
            $night_diff = $request->night_differential[$key];
            $double_pay = $request->double_pay[$key];
            $holiday = $request->holiday[$key];
            $bonus = $request->bonus[$key];
            
            // Total Deductions
            $sss = $benefit->getSSS($basic_pay) / 2;
            $philhealth = $benefit->getPhilhealth($basic_pay) / 2;
            $pagibig = 100 / 2;
            $loans = $request->loans[$key];
            $others = $request->others[$key];
            $absent = $request->absent[$key];
            
            if (Option::loan($employee->id)) {
                
                $loanData = Employee::find($employee->id)->loans()->where('date_start','<=',date('Y-m-d'))->where('status','=',1002)->first();
                
                // $loan_id = Option::loan($employee->id)->id;
                
                $loan_items_data = [
                    'amount' => $loans,
                    'status' => 1001,
                    'date' => date('Y-m-d'),
                ];
                
                Loan::find($loanData->id)->loan_items()->create($loan_items_data);
                
            }else{
                $loans = 0;
            }
            
            
            
            $totalEarnings = ($basic_pay + $overtime + $night_diff + $double_pay + $holiday + $bonus) - ( $absent + $sss + $philhealth + $pagibig + $others);
            $basic_pay_divided = $basic_pay / 2;
            
            $totalTaxSalary = Option::salaryTax($employee->basic_pay, $employee->status);
            
            // $totalTaxSalary = Option::tax($totalEarnings, $employee->status);
            
            $total_pay  = ($basic_pay + $overtime + $night_diff + $double_pay + $holiday + $bonus) - ( $sss + $pagibig + $philhealth + $absent + $others + $loans + $totalTaxSalary );
            $totalDeduction = $totalTaxSalary + $sss + $philhealth + $pagibig + $loans + $others + $absent;
            
            
            
            $data = [
                'company_id' => $comId,
                'payroll_id' => $paypal->id,
                'employee_id' => $employee->id,
                'basic_pay' => $employee->basic_pay / 2 ,
                
                //Income 
                'overtime' => $request->overtime[$key],
                'night_differential' => $request->night_differential[$key],
                'double_pay' => $request->double_pay[$key],
                'holiday' => $request->holiday[$key],
                'bonus' => $request->bonus[$key],
                
                // Total Deductions
                'sss' => $sss / 2,
                'pagibig' => $pagibig / 2,
                'philhealth' => $philhealth / 2,
                'tax' => $totalTaxSalary / 2,
                'loans' => $loans,
                'absent' => $request->absent[$key],
                'others' => $request->others[$key],                
                
                'deduction' => $totalDeduction,
                'total_pay' => $total_pay,
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
            $basic_pay = $payrollItems->basic_pay;
            $overtime = $request->overtime;
            $night_diff = $request->night_differential;
            $double_pay = $request->double_pay;
            $holiday = $request->holiday;
            $bonus = $request->bonus;
            
            // Deductions 
            $sss = Option::Benefits()->getSSS($basic_pay);
            $philhealth = Option::Benefits()->getPhilhealth($basic_pay);
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
