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



Route::auth();


// Landing Page
Route::get('/','HomeController@index');

// Admin Dashboard
// Route::get('dashboard/redirect','DashboardController@dashboardRedirect');


Route::get('dashboard','Admin\DashboardController@index');

// Admin Employees
Route::get('employees', 'Admin\EmployeeController@index');
Route::post('employees', 'Admin\EmployeeController@store');
Route::patch('employees/{id}', 'Admin\EmployeeController@update');

//Admin Payroll
Route::get('payroll', 'Admin\PayrollController@index');
Route::post('payroll', 'Admin\PayrollController@store');
Route::patch('payroll/editItem/{id}', 'Admin\PayrollController@updateItems');
Route::patch('payroll/edit/{id}', 'Admin\PayrollController@update');
Route::delete('payroll/{id}', 'Admin\PayrollController@destroy');

//Admin Attendance
Route::get('attendance', 'Admin\AttendanceController@index');

//Admin Company
Route::get('company/setup','Admin\CompanyController@index');
Route::patch('company/setup','Admin\CompanyController@update');




Route::get('email', 'HomeController@email');

Route::get('user/activation/{token}', 'HomeController@employeeReg');





// Employee Pages
Route::group(['middlewareGroups' => 'employee'], function () {
    //Login Routes...
    
    Route::get('/employee/login','Employee\AuthController@showLoginForm');
    Route::post('/employee/login','Employee\AuthController@login');
    Route::get('/employee/logout','Employee\AuthController@logout');

    // Employee Dashboard
    Route::get('/employee', 'Employee\DashboardController@index');
    
    Route::get('/employee/dashboard', 'Employee\DashboardController@index');
    Route::post('/employee/timein', 'Employee\DashboardController@timeIn');
    Route::patch('/employee/timeout/{id}', 'Employee\DashboardController@timeOut');
    
    Route::get('/employee/clock', 'Employee\DashboardController@time');
    
    // Employee Attendance
    Route::get('/employee/attendance', 'Employee\AttendanceController@index');
    

    // Employee Payslip...
    Route::get('/employee/payslip', 'Employee\PayslipController@index');
    
    // Employee Loans..
    Route::get('/employee/loans', 'Employee\LoanController@index');
    Route::post('/employee/loans', 'Employee\LoanController@store');
    
    
    
    
    
    
    Route::get('admin/register', 'Admin\AuthController@showRegistrationForm');
    Route::post('admin/register', 'Admin\AuthController@register');
    
    
    
    
    
    Route::get('/employee/settings', 'EmployeeAccController@setting');
    Route::patch('/employee/settings/{$id}/edit', 'EmployeeAccController@settingUpdate');
    
}); 











// *** PAYROLL ***
Route::get('payrolls','PagesController@payroll');
// Route::get('payslip','PagesController@payslip');
Route::get('bank','PagesController@bank');
Route::get('governmentforms','PagesController@governmentforms');
Route::get('bonus','PagesController@bonus');
Route::get('commision','PagesController@commision');


// *** PAY ACCOUNT ***
Route::get('pay/account','PagesController@pay_account');
Route::get('pay/account/create','PagesController@pay_account_create');


// *** EMPLOYEE ***
Route::get('employee-201','EmployeeController@index');
Route::post('employee-201','EmployeeController@store');



Route::get('earnings','PagesController@earnings');

// Payadjustment
Route::get('payAdjustment','PayAdjustmentController@index');
Route::post('payAdjustment','PayAdjustmentController@store');
Route::patch('payAdjustment/{id}','PayAdjustmentController@update');





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





// *** COMPANY ORGANIZATIONAL ***
// Location & Office function
Route::get('company/location&officess','LocationController@index');
Route::post('company/location&officess/create','LocationController@store');

// Department function
Route::get('company/departments','OptionController@departmentIndex');
Route::post('company/departments','OptionController@departmentStore');
Route::patch('company/departments/{id}','OptionController@departmentUpdate');

// Postion function
Route::get('company/positions','OptionController@positionIndex');
Route::post('company/positions','OptionController@positionStore');
Route::patch('company/positions/{id}','OptionController@positionUpdate');

// Rank function
Route::get('company/ranks','OptionController@rankIndex');
Route::post('company/ranks','OptionController@rankStore');
Route::patch('company/ranks/{id}','OptionController@rankUpdate');

// Employee Type function
Route::get('company/employment-type','OptionController@employeetypeIndex');
Route::post('company/employment-type','OptionController@employeetypeStore');
Route::patch('company/employment-type/{id}','OptionController@employeetypeUpdate');




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


Route::get('/home', 'HomeController@index');
