<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployee201Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('employee_id');
            $table->string('last_name');  
            $table->string('first_name'); 
            $table->string('middle_name');
            $table->string('birthdate');  
            $table->string('gender'); 
            $table->string('status'); 
            $table->string('address');
            $table->string('country_city');   
            $table->string('zip_code');   
            $table->string('telephone_no');   
            $table->string('mobile_no');
            $table->string('email');  
            $table->integer('department'); 
            $table->integer('employment_type');
            $table->integer('position');  
            $table->integer('rank'); 
            $table->integer('work');
            $table->integer('location');  
            $table->string('cost_center');
            $table->string('payroll_group');   
            $table->string('payment'); 
            $table->string('method');  
            $table->string('bank');    
            $table->string('bank_type');   
            $table->string('bank_account_no');    
            $table->string('date_hired');  
            $table->string('date_ended');  
            $table->string('tax');
            $table->string('TIN');
            $table->string('RDO');
            $table->string('SSS');
            $table->string('HDMF');    
            $table->string('Philhealth'); 
            $table->string('leave_approval_group');
            $table->string('timesheet_approval_group');    
            $table->string('OT_approval_group');   
            $table->string('expense_approval_group'); 
            $table->string('loan_approval_group'); 
            $table->string('deduct_SSS_contribution');   
            $table->string('fixed_SSS_amount');    
            $table->string('deduct_HDMF_contribution');  
            $table->string('fixed_HDMF_amount');  
            $table->string('deduct_philhealth_contribution');
            $table->string('fixed_philhealth_amount'); 
            $table->string('basic_pay_amount');    
            $table->string('pay_rate_type');   
            $table->string('timesheet_required');
            $table->string('entitled_to_overtime'); 
            $table->string('entitled_night_differential');    
            $table->string('entitled_unworked_regular_holiday_pay');  
            $table->string('entitled_unworked_special_holiday_pay'); 
            $table->string('entitled_holiday_premium_pay');
            $table->string('entitled_rest_day_pay');
            $table->string('withholding_tax_type');    
            $table->string('expanded_withholding_tax_rate');   
            $table->string('entitled_deminimis'); 
            $table->string('active');
            $table->text('photo');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees');
    }
}
