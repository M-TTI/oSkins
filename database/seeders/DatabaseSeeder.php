<?php

namespace Database\Seeders;

use App\Models\Skin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'MTTI',
            'email' => 'admin@example.com',
            'is_admin' => 1,
        ]);

        Skin::Create([
            'name' => 'Default Skin',
            'author' => 'MTTI',
            'path_to_file' => 'skins/default.osk',
        ]);
    }
}
