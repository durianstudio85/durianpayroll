<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldPayrollItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payroll_items', function (Blueprint $table) {
            $table->decimal('overtime', 15, 2);
            $table->decimal('night_differential', 15, 2);
            $table->decimal('double_pay', 15, 2);
            $table->decimal('holiday', 15, 2);
            $table->decimal('bunos', 15, 2);
            $table->decimal('absent', 15, 2);
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->text('address');
            $table->string('ssn');
            $table->string('payment_mode');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payroll_items', function (Blueprint $table) {
            $table->dropColumn('overtime');
            $table->dropColumn('night_differential');
            $table->dropColumn('double_pay');
            $table->dropColumn('holiday');
            $table->dropColumn('bunos');
            $table->dropColumn('absent');
        });

        Schema::table('employees', function (Blueprint $table) 
        {
            $table->dropColumn('address');
            $table->dropColumn('ssn');
            $table->dropColumn('payment_mode');
        });
    }
}
