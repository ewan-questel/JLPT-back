<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeders for custom tables
        $this->call([
            KanjiSeeder::class,
            KanaSeeder::class,
            UserSeeder::class,
            // Add more seeders if needed
        ]);

        // Uncomment the following lines if you want to use the default User model factory
        // \App\Models\User::factory(10)->create();

        // Uncomment the following lines if you want to create a specific user using the factory
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
};