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

        $faker = Faker::create();

        $users = [];

        for ($i = 1; $i <= 30; $i++) {
            $name = $faker->name;

            $users[] = [
                'username' => strtolower(str_replace(' ', '_', $name)),
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'password' => Hash::make('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $users[]=[
            'username'=>'martin',
            'email'=>'martin.yordanov.my@gmail.com',
            'email_verified_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $users[] = [
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $users[] = [
            'username' => 'client',
            'email' => 'client@gmail.com',
            'email_verified_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $users[] = [
            'username' => 'teacher',
            'email' => 'teacher@gmail.com',
            'email_verified_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Insert users into the table
        DB::table('users')->insert($users);


    }

}
