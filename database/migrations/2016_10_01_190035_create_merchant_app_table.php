<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_app_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('merchant_application_form', 150);
            $table->string('complete_merchant_application_form', 150);
            $table->string('autorized_representative_id', 150);
            $table->string('principal_officer_owner_id', 150);
            $table->string('principal_officer_id1', 150);
            $table->string('principal_officer_id2', 150);
            $table->string('principal_officer_id3', 150);

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
        Schema::drop('merchant_app_table');
    }
}
