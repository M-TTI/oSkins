<?php

namespace Database\Seeders;

use App\Models\Tag;
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

        Tag::create([
            'label' => 'NoMod'
        ]);
        Tag::create([
            'label' => 'Hidden'
        ]);
        Tag::create([
            'label' => 'High AR'
        ]);
        Tag::create([
            'label' => 'Low AR'
        ]);
        Tag::create([
            'label' => 'Flow Aim'
        ]);
        Tag::create([
            'label' => 'Snap Aim'
        ]);
        Tag::create([
            'label' => 'Well-Rounded'
        ]);
    }
}
