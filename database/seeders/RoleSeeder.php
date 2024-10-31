<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->truncate();

        $roles = [
            ['name' => 'Administrateur', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lecteur', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Auteur', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('roles')->insert($roles);
    }
}
