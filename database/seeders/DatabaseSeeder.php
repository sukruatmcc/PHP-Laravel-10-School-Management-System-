<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@gmail.com',
             'user_type' => 1,
             'password'=> bcrypt(123456),
         ]);

         \App\Models\User::factory()->create([
            'name' => 'Teacher',
            'email' => 'teacher@gmail.com',
            'user_type' => 2,
            'password'=> bcrypt(123456),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'user_type' => 3,
            'password'=> bcrypt(123456),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Parent',
            'email' => 'parent@gmail.com',
            'user_type' => 4,
            'password'=> bcrypt(123456),
        ]);
    }
}
