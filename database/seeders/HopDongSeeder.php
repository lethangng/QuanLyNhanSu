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
                'ngaybatdau' => '2023-02-16'
            ],
            [
                'manv' => 1002,
                'ngaybatdau' => '2023-02-16'
            ],
            [
                'manv' => 1003,
                'ngaybatdau' => '2023-02-16'
            ],
            [
                'manv' => 1004,
                'ngaybatdau' => '2023-02-16'
            ],
            [
                'manv' => 1005,
                'ngaybatdau' => '2023-02-16'
            ]
        ];
        DB::table('hopdong')->insert($hopdongs);
    }
}
