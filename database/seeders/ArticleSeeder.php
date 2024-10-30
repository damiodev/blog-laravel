<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles')->insert([
            ['title' => 'First Article', 'message' => 'This is the first article.', 'user_id' => 1],
            // Ajoute d'autres articles ici
        ]);
    }
}
