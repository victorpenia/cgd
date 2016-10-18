<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('ci', 15);
            $table->string('relationship', 50);
            $table->string('status', 50);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
//            $table->integer('owner_id')->unsigned();
//            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::create('visitor_owner', function (Blueprint $table){
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->integer('visitor_id')->unsigned();   
            $table->integer('user_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('owner_id')->references('id')->on('owners');
            $table->foreign('visitor_id')->references('id')->on('visitors');
            
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
        Schema::drop('visitors');
    }
}
