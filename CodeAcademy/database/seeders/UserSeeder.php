<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Create Faker instance
        $faker = Faker::create();

        // Generate dummy users
        $users = [];

        for ($i = 1; $i <= 10; $i++) {
            $name = $faker->name;

            $users[] = [
                'username' => strtolower(str_replace(' ', '_', $name)),
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'password' => Hash::make('password123'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert users into the table
        DB::table('users')->insert($users);
    }

}
