<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //vaciar la tabla
        User::truncate();

        $faker = \Faker\Factory::create();

        //Crear la misma ckave para todos los usuarios
        //Conviene hacerlo antes del for para que el seeder no se vuelva lento
       // $password = Hash::make('123456');
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@prueba.com',
            'password' =>bcrypt('12345678')
        ]);

        for($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email'  => $faker->email,
                'password' => bcrypt('12345678')
            ]);
        }
    }
}
