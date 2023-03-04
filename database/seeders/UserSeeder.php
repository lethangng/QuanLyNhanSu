<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'thang@gmail.com',
                'password' => '$2a$12$b4vKJAnSVrz.ahpkHaQqOe8e.laE6zuJLe.OyilnYAufPvPKH9RbK',
                'manv' => 1
            ],
            [
                'email' => 'thanh@gmail.com',
                'password' => '$2a$12$b4vKJAnSVrz.ahpkHaQqOe8e.laE6zuJLe.OyilnYAufPvPKH9RbK',
                'manv' => 5
            ]
        ];
        DB::table('users')->insert($users);
    }
}
