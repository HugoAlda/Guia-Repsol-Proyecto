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
            'username' => 'Administrador',
            'name' => 'admin',
            'apellidos_user' => 'Administrador',
            'email' => 'admin@fje.edu',
            'password' => bcrypt('secret'),
            'id_roles' => 1,
            'remember_token' => null,
        ]);

        User::create([
            'username' => 'marcmartinez',
            'name' => 'Marc',
            'apellidos_user' => 'Martinez',
            'email' => 'marc@fje.edu',
            'password' => bcrypt('secret'),
            'id_roles' => 2,
            'remember_token' => null,
        ]);
    }
}
