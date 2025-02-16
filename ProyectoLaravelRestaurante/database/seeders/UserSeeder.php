<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'delta',
            'name' => 'Hugo',
            'apellidos_user' => 'Alda',
            'email' => 'hugo.alda@gmail.com',
            'password' => bcrypt('qweQWE123@'),
            'id_roles' => 1,
            'remember_token' => null,
        ]);

        User::create([
            'username' => 'marcmartinez',
            'name' => 'Marc',
            'apellidos_user' => 'Martinez',
            'email' => 'marc@fje.edu',
            'password' => bcrypt('qweQWE123@'),
            'id_roles' => 2,
            'remember_token' => null,
        ]);

        User::create([
            'username' => 'alejandro',
            'name' => 'Alejandro',
            'apellidos_user' => 'Gonzalez',
            'email' => 'alejandro@fje.edu',
            'password' => bcrypt('qweQWE123@'),
            'id_roles' => 2,
            'remember_token' => null,
        ]);

        User::create([
            'username' => 'prysma',
            'name' => 'Erik',
            'apellidos_user' => 'Peñas',
            'email' => 'erik@fje.edu',
            'password' => bcrypt('qweQWE123@'),
            'id_roles' => 2,
            'remember_token' => null,
        ]);
    }
}
