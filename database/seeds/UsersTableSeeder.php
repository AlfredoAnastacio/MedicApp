<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alfredo Ramírez',
            'email' => 'test@prueba.com',
            'password' => bcrypt('123123'),
            'dni' => '123456789',
            'address' => 'conocido',
            'phone' => '2213123123',
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Daniel Ramírez',
            'email' => 'test1@prueba.com',
            'password' => bcrypt('123123'),
            'dni' => '123456721',
            'address' => 'conocido',
            'phone' => '2213123123',
            'role' => 'patient'
        ]);

        User::create([
            'name' => 'Alfonso Ramírez',
            'email' => 'test2@prueba.com',
            'password' => bcrypt('123123'),
            'dni' => '123456743',
            'address' => 'conocido',
            'phone' => '2213123123',
            'role' => 'doctor'
        ]);

        factory(User::class, 20)->create();
    }
}
