<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 35);
            $table->timestamps();
        });
        
        Schema::create('method_role', function (Blueprint $table){
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('method_id')->unsigned();
            $table->integer('status');
            
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('method_id')->references('id')->on('methods');
            
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
        Schema::drop('roles');
    }
}
