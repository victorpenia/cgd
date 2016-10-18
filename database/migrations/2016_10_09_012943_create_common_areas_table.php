<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 35)->unique();
            $table->string('code', 15)->unique();
            $table->decimal('price_one', 7, 2);
            $table->decimal('price_two', 7, 2);
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        
        Schema::create('common_area_owner', function (Blueprint $table){
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->integer('common_area_id')->unsigned();   
            $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('owner_id')->references('id')->on('owners');
            $table->foreign('common_area_id')->references('id')->on('common_areas');
            
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
        Schema::drop('common_areas');
    }
}
