<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClosetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('owner_id')->nullable()->unsigned();
            $table->integer('place_closet_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('owners');            
            $table->foreign('place_closet_id')->references('id')->on('place_closets')->onDelete('cascade');
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
        Schema::drop('closets');
    }
}
