<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('ci', 15)->unique();
            $table->string('address', 150);
            $table->string('phone_house', 15);
            $table->string('phone_office', 15);
            $table->string('cell_phone', 15);
            $table->integer('number_people');
            $table->string('status', 50);
            $table->string('email', 50)->unique();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
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
        Schema::drop('tenants');
    }
}
