<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
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
            $table->integer('company_id');
            $table->string('empID');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('gender');
            $table->string('status');
            $table->string('email');
            $table->text('address');
            $table->string('ssn');
            $table->string('payment_mode');
            $table->string('tel_no');
            $table->string('mobile_no');
            $table->integer('position_id');
            $table->decimal('basic_pay', 15, 2);
            $table->string('acc_status');
            $table->text('photo');
            $table->string('password');
            $table->rememberToken();
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
