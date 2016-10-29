<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImplementingAgreementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('implementing_agreement_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('implementing_agreement_template', 150);
            $table->string('complete_implementing_agreement', 150);
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
        Schema::drop('implementing_agreement_table');
    }
}
