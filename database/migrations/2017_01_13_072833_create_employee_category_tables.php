<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeCategoryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->decimal('basic_pay', 11, 2);
            $table->integer('rate_type');
            $table->date('effective_date');
            $table->date('adjustment_date');
            $table->string('adjustment_reason');
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->string('status');
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
        Schema::drop('adjustments');
    }
}
