<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSettingBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_setting_building', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 75)->unique();
            $table->string('nit', 15);
            $table->string('logo', 150);
            $table->string('city', 50);
            $table->string('address', 100);
            $table->string('phone', 15);
            $table->string('cell_phone', 15);
            $table->string('web', 75)->unique();
            $table->string('email', 75)->unique();
//            $table->integer('number_block');
//            $table->string('format_block', 30);
//            $table->integer('number_department');
//            $table->text('description_department');
//            $table->integer('number_parking');
//            $table->string('format_parking', 30);
//            $table->integer('number_closet');
//            $table->string('format_closet', 30);
            $table->decimal('increment_factor', 7, 2);
            $table->string('quota_factor', 30);
            $table->string('type_money', 15);
            $table->decimal('type_change', 7, 2);
            $table->string('theme', 15);
            $table->string('separate_decimal', 15);
            $table->string('discount_payment', 30);
            $table->integer('discount_payment_number');
            $table->string('discount_payment_select', 30);
            $table->string('breach', 30);
            $table->integer('breach_number');
            $table->string('breach_select', 30);
            $table->integer('limit_date_payment');
            $table->date('init_date');
            $table->date('end_date');
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
        Schema::drop('general_setting_building');
    }
}
