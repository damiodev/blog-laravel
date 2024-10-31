<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $articles = [];

        for ($i = 1; $i <= 50; $i++) {
            $articles[] = [
                'title' => $faker->sentence(6), // Titre de 6 mots
                'message' => $faker->paragraph(3), // Contenu de 3 paragraphes
                'user_id' => rand(1, 5), // Changez 5 par le nombre d'utilisateurs dans votre table users
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('articles')->insert($articles);
    }
}