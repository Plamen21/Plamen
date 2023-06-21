<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TrainersSeeder extends Seeder
{
    public function run()
    {
        // Create Faker instance
        $faker = Faker::create();

        // Get all user IDs
        $userIds = DB::table('users')->pluck('id')->all();

        // Generate dummy trainer records
        for ($i = 1; $i <= 10; $i++) {
            $userId = $faker->randomElement($userIds);

            DB::table('trainers')->insert([
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
