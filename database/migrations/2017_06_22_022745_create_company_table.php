<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('company_name');
            $table->string('trade_name');
            $table->string('org_type');
            $table->text('company_logo');
            $table->string('business_address');
            $table->string('business_city');
            $table->string('business_zip');
            $table->string('business_country');
            $table->string('contact_email');
            $table->string('contact_telephone');
            $table->string('contact_telephone_ext');
            $table->string('contact_fax');
            $table->string('contact_web');
            $table->string('contact_mobile');
            $table->string('gov_business_cat');
            $table->string('gov_rdo');
            $table->string('gov_hdmf');
            $table->string('gov_tin');
            $table->string('gov_sss');
            $table->string('gov_philhealth');
            $table->string('salary_type');
            $table->string('nav');
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
         Schema::drop('companies');
    }
}
