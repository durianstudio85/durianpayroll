<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavOptionsAndImagesForEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('nav');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->text('photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('nav');
        });

        Schema::table('employees', function (Blueprint $table) 
        {
            $table->dropColumn('photo');
        });



    }
}
