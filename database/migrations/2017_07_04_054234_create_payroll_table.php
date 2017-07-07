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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('payroll_id');
            $table->date('date_start_range');
            $table->date('date_end_range');
            $table->string('cycle_type');
            $table->string('status');
            $table->timestamps();
        });
        
        Schema::create('payroll_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('payroll_id');
            $table->integer('employee_id');
            $table->decimal('basic_pay', 15, 2);
            $table->decimal('sss', 15, 2);
            $table->decimal('pagibig', 15, 2);
            $table->decimal('philhealth', 15, 2);
            $table->decimal('tax', 15, 2);
            $table->decimal('deduction', 15, 2);
            $table->decimal('total_pay', 15, 2);
            $table->decimal('overtime', 15, 2);
            $table->decimal('night_differential', 15, 2);
            $table->decimal('double_pay', 15, 2);
            $table->decimal('holiday', 15, 2);
            $table->decimal('bonus', 15, 2);
            $table->decimal('absent', 15, 2);
            $table->decimal('loans', 15, 2);
            $table->decimal('others', 15, 2);
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
        Schema::drop('payrolls');
        Schema::drop('payroll_items');
    }
}
