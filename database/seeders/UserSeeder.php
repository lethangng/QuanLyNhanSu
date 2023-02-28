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
                'email' => 'admin@gmail.com',
                'password' => '$2a$12$b4vKJAnSVrz.ahpkHaQqOe8e.laE6zuJLe.OyilnYAufPvPKH9RbK',
                'name' => 'admin'
            ],
            [
                'email' => 'giangvien@gmail.com',
                'password' => '$2a$12$b4vKJAnSVrz.ahpkHaQqOe8e.laE6zuJLe.OyilnYAufPvPKH9RbK',
                'name' => 'giangvien'
            ],
            [
                'email' => 'nhanvien@gmail.com',
                'password' => '$2a$12$b4vKJAnSVrz.ahpkHaQqOe8e.laE6zuJLe.OyilnYAufPvPKH9RbK',
                'name' => 'nhanvien'
            ],
            [
                'email' => 'nhansu@gmail.com',
                'password' => '$2a$12$b4vKJAnSVrz.ahpkHaQqOe8e.laE6zuJLe.OyilnYAufPvPKH9RbK', // Password = 1234
                'name' => 'nhansu'
            ],
            [
                'email' => 'taichinh@gmail.com',
                'password' => '$2a$12$b4vKJAnSVrz.ahpkHaQqOe8e.laE6zuJLe.OyilnYAufPvPKH9RbK',
                'name' => 'taichinh'
            ]
        ];
        DB::table('users')->insert($users);
    }
}
