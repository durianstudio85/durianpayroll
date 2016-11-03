<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use DB;




class PagesController extends Controller
{

	public function __construct()
	    {
	        $this->middleware('auth');
	    }

	public function login()
	   {
	   	return view('login');
	   }

   	public function dashboard()
	   {
	   	return view('pages.dashboard');
	   }












// PAYROLL FUNCTION	   

	public function payroll()
	   {
	   	$dp_payroll = DB::table('payroll_table')->get();
	   	return view('pages.payroll.payroll',compact('dp_payroll') );
	   } 

	public function payslip()
	   {
	   	$dp_payslip = DB::table('payslip_table')->get();
	   	return view('pages.payroll.payslip',compact('dp_payslip') );
	   }  

	public function bank()
	   {
	   	$dp_bank = DB::table('bank_table')->get();
	   	return view('pages.payroll.bank',compact('dp_bank') );
	   } 

	public function governmentforms()
	   {
	   	$dp_governmentform = DB::table('government_form_table')->get();
	   	return view('pages.payroll.governmentforms',compact('dp_governmentform')  );
	   }   

	public function bonus()
	   {
	   	$dp_bonus = DB::table('bonus_table')->get();
	   	return view('pages.payroll.bonus',compact('dp_bonus') );
	   }

	public function commision()
	   {
	   	$dp_commision = DB::table('commision_table')->get();
	   	return view('pages.payroll.commision',compact('dp_commision') );
	   }


// END PAYROLL FUNCTION


















// PAYROLL PAY ACCOUNT


	 public function pay_account()
	   {
	   	return view('pages.pay-account.pay_account');
	   }
	 public function pay_account_create()
	   {
	   	return view('pages.pay-account.pay_account_create');
	   }  


// END PAYROLL PAY ACCOUNT



















// PAYROLL EMPLOYEE

	 public function employee_201()
	   {
	   	$dp_employee_201 = DB::table('employee_201_table')->get();
	   	return view('pages.employee.employee-201',compact('dp_employee_201') );
	   } 
	 public function earnings()
	   {
	   	return view('pages.employee.earnings');
	   } 
	 public function payAdjustment()
	   {
	   	return view('pages.employee.pay-adjustment');
	   } 
	 public function allowance()
	   {
	   	return view('pages.employee.allowance');
	   }
	 public function loan()
	   {
	   	return view('pages.employee.loan');
	   }
	 public function deduction()
	   {
	   	return view('pages.employee.deduction');
	   }
	 public function adjustment()
	   {
	   	return view('pages.employee.adjustment');
	   }
	  public function shifts()
	   {
	   	return view('pages.employee.shifts');
	   }
	  public function leaves()
	   {
	   	return view('pages.employee.leaves');
	   }
	  public function termination()
	   {
	   	return view('pages.employee.termination');
	   }  
	 public function ytd_summary()
	   {
	   	return view('pages.employee.ytd_summary');
	   }                              	             


//END PAYROLL EMPLOYEE



















// COMPANY SETUP


// *** COMPANY ORAGNIZATION ***
	public function company()
	 {
	   	return view('pages.company-setup.company-organization.company');
	 } 
	 public function company_location_officess()
	 {
	   	return view('pages.company-setup.company-organization.company-location-officess');
	 } 
	 public function company_departments()
	 {
	   	return view('pages.company-setup.company-organization.company-departments');
	 } 
	 public function company_positions()
	 {
	   	return view('pages.company-setup.company-organization.company-positions');
	 } 
	 public function company_ranks()
	 {
	   	return view('pages.company-setup.company-organization.company-ranks');
	 }
	 public function company_employment_type()
	 {
	   	return view('pages.company-setup.company-organization.company-employment-type');
	 } 	 




// *** COMPANY TIME ***
	public function company_assign_restrictions()
		 {
		   	return view('pages.company-setup.company-time.company-assign-restrictions');
		 }

	public function company_holiday()
		 {
		   	return view('pages.company-setup.company-time.company-holiday');
		 }

	public function company_leave_entitlement()
		 {
		   	return view('pages.company-setup.company-time.company-leave-entitlement');
		 }	 
	public function company_leave_type()
		 {
		   	return view('pages.company-setup.company-time.company-leave-type');
		 }
	public function company_methods()
		 {
		   	return view('pages.company-setup.company-time.company-methods');
		 }
	public function company_night_shifts()
		 {
		   	return view('pages.company-setup.company-time.company-night-shifts');
		 }
	public function company_restrictions()
		 {
		   	return view('pages.company-setup.company-time.company-restrictions');
		 }
	public function company_shift_per_department()
		 {
		   	return view('pages.company-setup.company-time.company-shift-per-department');
		 }
	public function company_shifts()
		 {
		   	return view('pages.company-setup.company-time.company-shifts');
		 }	
	public function company_tardiness_rules()
		 {
		   	return view('pages.company-setup.company-time.company-tardiness-rules');
		 }	  
	public function company_work_days()
		 {
		   	return view('pages.company-setup.company-time.company-work-days');
		 }	 









// *** COMPANY PAYROLL ***
	public function company_payroll_group()
		 {
		   	return view('pages.company-setup.company-payroll.company-payroll-group');
		 }
	public function company_payslip_template_wizard()
		 {
		   	return view('pages.company-setup.company-payroll.company-payslip-template-wizard');
		 }	 
	public function company_settings()
		 {
		   	return view('pages.company-setup.company-payroll.company-settings');
		 }
	public function company_allowance_type()
		 {
		   	return view('pages.company-setup.company-payroll.company-allowance-type');
		 }
	public function company_bonus_type()
		 {
		   	return view('pages.company-setup.company-payroll.company-bonus-type');
		 }
	public function company_commission_type()
		 {
		   	return view('pages.company-setup.company-payroll.company-commission-type');
		 }	 	 

	public function company_loan_type()
		 {
		   	return view('pages.company-setup.company-payroll.company-loan-type');
		 }
	public function company_contributions()
		 {
		   	return view('pages.company-setup.company-payroll.company-contributions');
		 }
	public function company_deductions()
		 {
		   	return view('pages.company-setup.company-payroll.company-deductions');
		 }		 
	public function company_days_hours_rates()
		 {
		   	return view('pages.company-setup.company-payroll.company-days-hours-rates');
		 }		 
	public function company_annualizations()
		 {
		   	return view('pages.company-setup.company-payroll.company-annualizations');
		 }		 






// *** COMPANY EXPENSES ***
	public function company_expenses_type()
		 {
		   	return view('pages.company-setup.company-expenses.company-expenses-type');
		 }






// *** COMPANY AUTOMATION ***
	public function company_work_flows()
		 {
		   	return view('pages.company-setup.company-automation.company-work-flows');
		 }		 




















// END COMPANY SETUP

}
