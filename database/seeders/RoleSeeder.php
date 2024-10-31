<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Désactiver les vérifications de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Vider la table roles
        DB::table('roles')->truncate();
        
        // Réactiver les vérifications de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create();
        $roles = [];

        for ($i = 1; $i <= 10; $i++) {
            $roles[] = [
                'name' => $faker->unique()->word . ' Role', // Rôle unique avec un mot aléatoire
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('roles')->insert($roles);
    }
}
