<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
        Schema::drop('payroll_items');
    }
}
