<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            ['message' => 'Great article!', 'article_id' => 1, 'user_id' => 1],
            ['message' => 'I agree with you.', 'article_id' => 1, 'user_id' => 1],
            // Ajoute d'autres commentaires ici si besoin
        ]);
    }
}
