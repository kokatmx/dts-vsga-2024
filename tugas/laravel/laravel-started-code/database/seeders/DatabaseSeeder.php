<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Level;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Level::factory()->create([
        //     'level_id' => 1,
        //     'level_nama' => 'admin',
        // ]);

        // Level::factory()->create([
        //     'level_id' => 2,
        //     'level_nama' => 'user',
        // ]);
        User::factory(48)->create();
    }
}
