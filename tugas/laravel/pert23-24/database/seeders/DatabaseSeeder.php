<?php

namespace Database\Seeders;

use App\Models\Categori;
use App\Models\Level;
use App\Models\User;
use Illuminate\Container\Attributes\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Level::factory()->create([
        //     'level_id' => 1,
        //     'level_nama' => 'admin',
        // ]);
        // Level::factory()->create([
        //     'level_id' => 2,
        //     'level_nama' => 'user',
        // ]);
        // User::factory(37)->create();
        Categori::factory(10)->create();
    }
}
