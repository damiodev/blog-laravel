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
            ['article_id' => 1, 'message' => 'Great article!', 'user_id' => 1],
            // Ajoute d'autres commentaires avec un `user_id` valide
        ]);
    }
}
