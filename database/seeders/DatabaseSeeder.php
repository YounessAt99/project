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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);
        
        User::factory()->create([
            'name' => 'agent',
            'name' => 'agent',
            'email' => 'agent@example.com',
        ]);

        User::factory()->create([
            'name' => 'client',
            'name' => 'client',
            'email' => 'client@example.com',
        ]);
    }
}
