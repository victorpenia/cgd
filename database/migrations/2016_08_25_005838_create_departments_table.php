<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->unique();
            $table->string('code', 15)->unique();
            $table->integer('floor');
            $table->string('category', 50);
            $table->decimal('area_m2', 7, 2);
            $table->string('status', 35);
            $table->text('description');
            
            $table->integer('block_id')->unsigned();
            $table->foreign('block_id')->references('id')->on('blocks');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('owner_id')->nullable()->unsigned();
            $table->foreign('owner_id')->references('id')->on('owners');
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
        Schema::drop('departments');
    }
}
