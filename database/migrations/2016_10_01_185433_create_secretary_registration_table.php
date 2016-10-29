<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecretaryRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secretary_registration_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('secretary_registration', 150);
            $table->string('additional_document1', 150);
            $table->string('additional_document2', 150);
            
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
        Schema::drop('secretary_registration_table');
    }
}
