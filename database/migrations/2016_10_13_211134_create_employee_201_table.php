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
        Schema::create('employee_201_table', function (Blueprint $table) {
            $table->increments('employee_id');
            $table->string('employee_last_name');  
            $table->string('employee_first_name'); 
            $table->string('employee_middle_name');
            $table->string('employee_birthdate');  
            $table->string('employee_gender'); 
            $table->string('employee_status'); 
            $table->string('employee_address');
            $table->string('employee_country_city');   
            $table->string('employee_zip_code');   
            $table->string('employee_telephone_no');   
            $table->string('employee_mobile_no');
            $table->string('employee_email');  

            $table->string('employee_department'); 
            $table->string('employee_employment_type');
            $table->string('employee_position');  
            $table->string('employee_rank'); 
            $table->string('employee_work');
            $table->string('employee_location');  
            $table->string('employee_cost_center');
            $table->string('employee_payroll_group');   
            $table->string('employee_payment'); 
            $table->string('employee_method');  
            $table->string('employee_bank');    
            $table->string('employee_bank_type');   
            $table->string('employee_bank_account_no');    
            $table->string('employee_date_hired');  
            $table->string('employee_date_ended');  
            $table->string('employee_tax');
            $table->string('employee_TIN');
            $table->string('employee_RDO');
            $table->string('employee_SSS');
            $table->string('employee_HDMF');    
            $table->string('employee_Philhealth'); 
            $table->string('employee_leave_approval_group');
            $table->string('employee_timesheet_approval_group');    
            $table->string('employee_OT_approval_group');   
            $table->string('employee_expense_approval_group'); 
            $table->string('employee_loan_approval_group'); 
            $table->string('employee_deduct_SSS_contribution');   
            $table->string('employee_fixed_SSS_amount');    
            $table->string('employee_deduct_HDMF_contribution');  
            $table->string('employee_fixed_HDMF_amount');  
            $table->string('employee_deduct_philhealth_contribution');
            $table->string('employee_fixed_philhealth_amount'); 
            $table->string('employee_basic_pay_amount');    
            $table->string('employee_pay_rate_type');   
            $table->string('employee_timesheet_required');
            $table->string('employee_entitled_to_overtime'); 
            $table->string('employee_entitled_night_differential');    
            $table->string('employee_entitled_unworked_regular_holiday_pay');  
            $table->string('employee_entitled_unworked_special_holiday_pay'); 
            $table->string('employee_entitled_holiday_premium_pay');
            $table->string('employee_entitled_rest_day_pay');
            $table->string('employee_withholding_tax_type');    
            $table->string('employee_expanded_withholding_tax_rate');   
            $table->string('employee_entitled_deminimis'); 
            $table->string('employee_active');
            $table->string('employee_created_by');
            $table->string('employee_updated_by');
            

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
        Schema::drop('employee_201_table');
    }
}
