<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('login');
// });

// Route::get('dashboard', function () {
//     return view('pages.dashboard');
// });

// Route::get('dashboard', function () {
//     return view('pages.dashboard');
// });

// Landing Page
Route::get('/','HomeController@index');

// Dashboard
Route::get('dashboard','DashboardController@index');





















// *** PAYROLL ***
Route::get('payroll','PagesController@payroll');
Route::get('payslip','PagesController@payslip');
Route::get('bank','PagesController@bank');
Route::get('governmentforms','PagesController@governmentforms');
Route::get('bonus','PagesController@bonus');
Route::get('commision','PagesController@commision');




// *** PAY ACCOUNT ***
Route::get('pay/account','PagesController@pay_account');
Route::get('pay/account/create','PagesController@pay_account_create');






// *** EMPLOYEE ***
Route::get('employee-201','PagesController@employee_201');
Route::get('earnings','PagesController@earnings');
Route::get('payAdjustment','PagesController@payAdjustment');
Route::get('allowance','PagesController@allowance');
Route::get('loan','PagesController@loan');
Route::get('deduction','PagesController@deduction');
Route::get('adjustment','PagesController@adjustment');
Route::get('shifts','PagesController@shifts');
Route::get('leaves','PagesController@leaves');
Route::get('termination','PagesController@termination');
Route::get('YTD-summary','PagesController@ytd_summary');




// *** COMPANY SETUP ***
// Route::get('company/setup','PagesController@company');
Route::get('company/setup','CompanyController@index');
Route::patch('company/setup','CompanyController@update');





// *** COMPANY ORGANIZATIONAL ***
Route::get('company/location&officess','PagesController@company_location_officess');
Route::get('company/departments','PagesController@company_departments');
Route::get('company/positions','PagesController@company_positions');
Route::get('company/ranks','PagesController@company_ranks');
Route::get('company/employment-type','PagesController@company_employment_type');




// *** COMPANY TIME ***

// *** COMPANY LEAVES ***
Route::get('company/leave-types','PagesController@company_leave_type');
Route::get('company/leave-entitlement','PagesController@company_leave_entitlement');

// *** COMPANY SCHEDULES ***
Route::get('company/work-days','PagesController@company_work_days');
Route::get('company/shifts','PagesController@company_shifts');
Route::get('company/shift/per-department','PagesController@company_shift_per_department');
Route::get('company/tardiness-rules','PagesController@company_tardiness_rules');

// *** COMPANY TIME ENTRY ***
Route::get('company/methods','PagesController@company_methods');
Route::get('company/restrictions','PagesController@company_restrictions');
Route::get('company/assign-restrictions','PagesController@company_assign_restrictions');


Route::get('company/holiday','PagesController@company_holiday');
Route::get('company/night-shifts','PagesController@company_night_shifts');




// *** COMPANY PAYROLL ***
Route::get('company/payroll-group','PagesController@company_payroll_group');

// *** COMPANY PAYSLIP ***
Route::get('company/payslip-template-wizard','PagesController@company_payslip_template_wizard');
Route::get('company/settings','PagesController@company_settings');

// *** COMPANY OTHER INCOME ***
Route::get('company/allowance-type','PagesController@company_allowance_type');
Route::get('company/bonus-type','PagesController@company_bonus_type');
Route::get('company/commission-type','PagesController@company_commission_type');


Route::get('company/loan-type','PagesController@company_loan_type');
Route::get('company/contributions','PagesController@company_contributions');
Route::get('company/deductions','PagesController@company_deductions');
Route::get('company/days/hours/rates','PagesController@company_days_hours_rates');
Route::get('company/annualizations','PagesController@company_annualizations');



// *** COMPANY EXPENSES ***
Route::get('company/expenses-type','PagesController@company_expenses_type');



// *** COMPANY AUTOMATION ***
Route::get('company/work-flows','PagesController@company_work_flows');
Route::auth();

Route::get('/home', 'HomeController@index');
