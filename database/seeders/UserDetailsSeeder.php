<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class UserDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();


        $userIds = DB::table('users')->pluck('id')->all();


        foreach ($userIds as $userId) {
            DB::table('user_details')->insert([
                'user_id' => $userId,
                'type'=>$faker->word(),
                'value'=>$faker->word(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
