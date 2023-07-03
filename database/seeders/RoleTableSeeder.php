<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = [];

        for ($i = 1; $i <= 30; $i++) {

            $roles[] = [
                'user_id' => $i,
                'role'=>'student',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $roles[] =[
            'user_id' => 31,
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $roles[] =[
            'user_id' => 32,
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $roles[] =[
            'user_id' => 33,
            'role' => 'client',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $roles[] =[
            'user_id' => 34,
            'role' => 'trainer',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('roles')->insert($roles);
    }
}
