<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Victor',
            'last_name' => 'Penia',
            'address' => 'Bolivar',
            'status' => 'Activo',
            'email' => 'victor_vhpq@hotmail.com',
            'password' => bcrypt('12345'),
            'role_id' => 1,
            'general_setting_id' => 1,
        ]);
        
//        factory(App\User::class, 50)->create()->each(function($u) {
//            $u->posts()->save(factory(App\Post::class)->make());
//        });
    }
}
