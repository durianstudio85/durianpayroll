<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bank_employee_name', 150);
            $table->string('bank_payroll_group', 150);
            $table->string('bank_date', 150);
            $table->string('bank_download', 150);
            
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
        Schema::drop('bank_table');
    }
}
