<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commision_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commision_type', 150);
            $table->string('commision_employees', 150);
            $table->string('commision_payroll', 150);
            $table->string('commision_amount', 150);
            $table->string('commision_created_by', 150);
            $table->string('commision_created_date', 150);
            $table->string('commision_update_by', 150);
            $table->string('commision_updated_date', 150);
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
        Schema::drop('commision_table');
    }
}
