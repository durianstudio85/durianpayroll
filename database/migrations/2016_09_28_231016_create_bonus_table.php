<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bonus_group_type', 150);
            $table->string('bonus_recipients', 150);
            $table->string('bonus_bonus_date', 150);
            $table->string('bonus_amount', 150);
            $table->string('bonus_created_by', 150);
            $table->string('bonus_created_date', 150);
           
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
        Schema::drop('bonus_table');
    }
}
