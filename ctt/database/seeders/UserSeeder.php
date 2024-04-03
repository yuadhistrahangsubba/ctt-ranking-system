<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'cid' => '12345678911',
                'email' => 'admin5209@gmail.com',
                'name' => 'Admin',
                'password' => bcrypt('admin2023'),
                'phone' => '17782481',
                'role' => 'admin',
                'status' => 'active',
            ],
            [
                'cid' => '12345678912',
                'email' => 'dorji@gmail.com',
                'name' => 'Dorji',
                'password' => bcrypt('dorji2023'),
                'phone' => '17782482',
                'role' => 'ao',
                'status' => 'active',
            ],
            [
                'cid' => '12345678913',
                'email' => 'tenzin@gmail.com',
                'name' => 'Tenzin',
                'password' => bcrypt('tenzin2023'),
                'phone' => '17782483',
                'role' => 'ao',
                'status' => 'active',
            ],
            [
                'cid' => '12345678914',
                'email' => 'hang@gmail.com',
                'name' => 'hang',
                'password' => bcrypt('hang2023'),
                'phone' => '17782484',
                'role' => 'student',
                'status' => 'active',
            ],
        ]);
    }

}
