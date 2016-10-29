<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayslipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslip_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payslip_employee_name', 150);
            $table->string('payslip_payroll_group', 150);
            $table->string('payslip_issued_on', 150);
            $table->string('payslip_access_by_employee', 150);
            $table->string('payslip_download', 150);
            
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
        Schema::drop('payslip_table');
    }
}
