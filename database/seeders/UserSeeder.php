<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Désactiver les vérifications de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Vider la table users
        DB::table('users')->truncate();
        
        // Réactiver les vérifications de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create();
        $users = [];

        for ($i = 1; $i <= 10; $i++) {
            $users[] = [
                'name' => $faker->name, // Nom aléatoire
                'email' => $faker->unique()->safeEmail, // Email unique
                'password' => bcrypt('password'), // Mot de passe
                'role_id' => rand(1, 3), // Changez 3 par le nombre de rôles dans votre table roles
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('users')->insert($users);
    }
}
