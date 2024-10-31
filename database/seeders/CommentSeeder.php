<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $comments = [];
        
        for ($i = 0; $i < 1000; $i++) {
            $comments[] = [
                'message' => $faker->sentence(),
                'article_id' => rand(1, 50), // Assure-toi que ces IDs existent
                'user_id' => rand(1, 10), // Peut être nul si l'utilisateur n'est pas connecté
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('comments')->insert($comments);
    }
}
