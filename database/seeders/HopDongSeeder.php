<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HopDongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hopdongs = [
            [
                'manv' => 1,
                'ngaybatdau' => '2023-02-16'
            ],
            [
                'manv' => 2,
                'ngaybatdau' => '2023-02-16'
            ],
            [
                'manv' => 3,
                'ngaybatdau' => '2023-02-16'
            ],
            [
                'manv' => 4,
                'ngaybatdau' => '2023-02-16'
            ],
            [
                'manv' => 5,
                'ngaybatdau' => '2023-02-16'
            ]
        ];
        DB::table('hopdong')->insert($hopdongs);
    }
}
