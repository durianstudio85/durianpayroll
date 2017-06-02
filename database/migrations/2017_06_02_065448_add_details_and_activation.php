<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetailsAndActivation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('dob');
            $table->string('address');
            $table->string('contactno1');
            $table->string('contactno2');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('dob');
            $table->dropColumn('address');
            $table->dropColumn('contactno1');
            $table->dropColumn('contactno2');
            $table->dropColumn('photo');
        });
    }
}
