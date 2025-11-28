<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ---------------------
        // ADMINS
        // ---------------------
        User::create([
            'name'     => 'Hiba',
            'prenom'   => 'Harbal',
            'email'    => 'hiba@gmail.com',
            'role'     => 'admin',
            'password' => Hash::make('21052006'),
        ]);

        User::create([
            'name'     => 'adil',
            'prenom'   => 'jeddi',
            'email'    => 'adil@gmail.com',
            'role'     => 'admin',
            'password' => Hash::make('admin1234'),
        ]);

        // ---------------------
        // CLIENTS
        // ---------------------
        User::create([
            'name'     => 'karim',
            'prenom'   => 'benali',
            'email'    => 'karim@gmail.com',
            'role'     => 'client',
            'password' => Hash::make('00000000'),
        ]);

        User::create([
            'name'     => 'Sofia',
            'prenom'   => 'Rachid',
            'email'    => 'sofia@gmail.com',
            'role'     => 'client',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name'     => 'Youssef',
            'prenom'   => 'Elhaj',
            'email'    => 'youssef@gmail.com',
            'role'     => 'client',
            'password' => Hash::make('youssef123'),
        ]);

        User::create([
            'name'     => 'Imane',
            'prenom'   => 'Bouali',
            'email'    => 'imane@gmail.com',
            'role'     => 'client',
            'password' => Hash::make('imane000'),
        ]);

        User::create([
            'name'     => 'Hamid',
            'prenom'   => 'Said',
            'email'    => 'hamid@gmail.com',
            'role'     => 'client',
            'password' => Hash::make('hamid123'),
        ]);

        User::create([
            'name'     => 'Nadia',
            'prenom'   => 'Fahim',
            'email'    => 'nadia@gmail.com',
            'role'     => 'client',
            'password' => Hash::make('nadia456'),
        ]);
    }
}
