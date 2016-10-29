<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGovernmentFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('government_form_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('government_type', 150);
            $table->string('government_form', 150);
            $table->string('government_date', 150);
            $table->string('government_frequency', 150);
            $table->string('government_download', 150);
            $table->string('government_action', 150);
   
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
        Schema::drop('government_form_table');
    }
}
