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
                'manv' => 1001,
                'ngaybatdau' => '2023-05-28',
                'ngayketthuc' => '2024-05-28'
            ],
            [
                'manv' => 1002,
                'ngaybatdau' => '2023-02-16',
                'ngayketthuc' => null
            ],
            [
                'manv' => 1003,
                'ngaybatdau' => '2023-03-10',
                'ngayketthuc' => '2025-07-28'
            ],
            [
                'manv' => 1004,
                'ngaybatdau' => '2023-01-06',
                'ngayketthuc' => null
            ],
            [
                'manv' => 1005,
                'ngaybatdau' => '2023-02-16',
                'ngayketthuc' => null
            ]
        ];
        DB::table('hopdong')->insert($hopdongs);
    }
}
