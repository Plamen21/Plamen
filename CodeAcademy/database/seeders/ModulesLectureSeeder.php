<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ModulesLectureSeeder extends Seeder
{
    public function run()
    {
        // Create Faker instance
        $faker = Faker::create();

        // Get all module IDs
        $moduleIds = DB::table('courses_modules')->pluck('id')->all();

        // Generate dummy module lectures
        for ($i = 1; $i <= 10; $i++) {
            $moduleId = $faker->randomElement($moduleIds);

            DB::table('modules_lectures')->insert([
                'module_id' => $moduleId,
                'lecture_name' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
