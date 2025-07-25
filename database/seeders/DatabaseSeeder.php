<?php

namespace Database\Seeders;

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
       \App\Models\User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => bcrypt('password'),
        'role' => 'HR'
    ]);
       \App\Models\User::factory()->create([
        'name' => 'Test User',
        'email' => 'developer@example.com',
        'password' => bcrypt('password'),
        'role' => 'Developer'
    ]);
    }
}
