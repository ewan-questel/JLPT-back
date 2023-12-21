<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin user
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            /* 'password' => Hash::make('password'), */
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Watchog 01',
            'email' => 'ew.questel@gmail.com',
            /* 'password' => Hash::make('password'), */
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Regular user
        DB::table('users')->insert([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            /* 'password' => Hash::make('password'), */
            'admin' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Add more users as needed...
    }
}