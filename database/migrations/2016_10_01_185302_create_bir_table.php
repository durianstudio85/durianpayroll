<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bir_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('certificate_registration', 150);
            $table->string('audited_financial_statement', 150);
            $table->string('company_name', 150);
            $table->string('company_address', 150);
            $table->string('company_phone', 150);
            $table->string('autorized_representative', 150);
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
        Schema::drop('bir_table');
    }
}
