<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payroll_group', 150);
            $table->string('payroll_run', 150);
            $table->string('payroll_period', 150);
            $table->string('payroll_company', 150);
            $table->string('payroll_employee', 150);
            $table->string('payroll_gross_income', 150);
            $table->string('payroll_net_pay', 150);
            $table->string('payroll_status', 150);
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
        Schema::drop('payroll_table');
    }
}
