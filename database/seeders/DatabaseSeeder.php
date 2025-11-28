<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Appelle le seeder des utilisateurs
        $this->call([
            UserSeeder::class,
            CompteSeeder::class,
        ]);
        $this->call([
    VirementSeeder::class,
]);


        // Ici tu pourras ajouter d'autres seeders comme :
        // CompteSeeder::class,
        // VirementSeeder::class,
    }
}