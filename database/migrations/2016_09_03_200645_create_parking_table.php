<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('owner_id')->nullable()->unsigned();
            $table->integer('place_parking_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('owners');            
            $table->foreign('place_parking_id')->references('id')->on('place_parkings')->onDelete('cascade');
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
        Schema::drop('parkings');
    }
}
