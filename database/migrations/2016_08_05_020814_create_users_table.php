<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('address', 150);
            $table->string('phone', 15);
            $table->string('cell_phone', 15);
            $table->string('status', 50);
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->integer('role_id')->unsigned();
            $table->integer('general_setting_id')->unsigned(); 
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('general_setting_id')->references('id')->on('general_setting_building');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
