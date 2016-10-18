<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 75);
//            $table->string('concept', 35);
            $table->integer('type');
            $table->string('status', 35);
//            $table->decimal('annual_estate', 11, 2);
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        
        Schema::create('annual_estimation_payment', function (Blueprint $table){
            $table->increments('id');
            $table->integer('annual_estimation_id')->unsigned();
            $table->integer('payment_id')->unsigned();
            $table->decimal('annual', 11, 2);
            $table->decimal('january', 11, 2);
            $table->decimal('february', 11, 2);
            $table->decimal('march', 11, 2);
            $table->decimal('april', 11, 2);
            $table->decimal('may', 11, 2);
            $table->decimal('june', 11, 2);
            $table->decimal('july', 11, 2);
            $table->decimal('august', 11, 2);
            $table->decimal('september', 11, 2);
            $table->decimal('octuber', 11, 2);
            $table->decimal('november', 11, 2);
            $table->decimal('december', 11, 2);            
            
            $table->foreign('annual_estimation_id')->references('id')->on('annual_estimations');
            $table->foreign('payment_id')->references('id')->on('payments');
            
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
        Schema::drop('payments');
    }
}
