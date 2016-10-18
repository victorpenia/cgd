<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnualEstimationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annual_estimations', function (Blueprint $table) {
            $table->increments('id');
//            $table->string('name', 50);
            $table->integer('annual_year')->unique();
//            $table->string('init_date', 50);
//            $table->string('end_date', 50);
            $table->string('status', 35);
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('annual_estimations');
    }
}
