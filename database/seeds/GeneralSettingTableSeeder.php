<?php

use Illuminate\Database\Seeder;

class GeneralSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_setting_building')->insert([
            'name' => 'Nombre Condominio',
            'logo' => 'condominio.jpg',
            'city' => 'Cochabamba',
            'address' => 'Sin direccion',
//            'number_department' => 20,
//            'number_block' => 1,
//            'format_block' => 'Letras',
//            'number_parking' => 20,
//            'format_parking' => 'Números',
//            'number_closet' => 40,
//            'format_closet' => 'Números',
            'increment_factor' => 20,
            'quota_factor' => 'Departamento',
            'type_money' => 'Bs',
            'type_change' => 6.96,
            'theme' => 'Azul',
            'separate_decimal' => 'Punto(.)',
            'discount_payment' => 'Porcentaje',
            'discount_payment_number' => 5,
            'discount_payment_select' => 'Seis Meses',
            'breach' => 'Porcentaje',
            'breach_number' => 5,
            'breach_select' => 'Por mes',
            'limit_date_payment' => 10,
            'init_date' => '2016-01-01',
            'end_date' => '2016-12-31',
        ]);
    }
}
