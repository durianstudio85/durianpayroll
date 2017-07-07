<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('employee_id');
            $table->date('date_start');
            $table->decimal('loan_amount', 15, 2);
            $table->decimal('amount_per_pay', 15, 2);
            $table->integer('status');
            $table->timestamps();
        });
        
        Schema::create('loan_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_id');
            $table->date('date');
            $table->decimal('amount', 15, 2);
            $table->integer('status');
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
        Schema::drop('loans');
        Schema::drop('loan_items');
    }
}
