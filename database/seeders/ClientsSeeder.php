<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsSeeder extends Seeder
{
    public function run()
    {
        $clients= [];

        for ($i = 5; $i <= 7; $i++) {
            $client = [
                'user_id' => 33,
                'course_id' => $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $clients[] = $client;
            }
            DB::table('clients')->insert($clients);

    }
}
