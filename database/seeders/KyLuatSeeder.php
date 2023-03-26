<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KyLuatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kyluats = [
            [
                'manv' => 1001,
                'ngaykyluat' => '2021-02-16',
                'lydo' => 'Vi phạm điều lệ'
            ],
            [
                'manv' => 1002,
                'ngaykyluat' => '2022-02-16',
                'lydo' => 'Bỏ giờ'
            ],
            [
                'manv' => 1003,
                'ngaykyluat' => '2023-02-16',
                'lydo' => 'Đi muộn'
            ],
            [
                'manv' => 1005,
                'ngaykyluat' => '2023-02-16',
                'lydo' => 'Không tích cực trong công việc'
            ],
            [
                'manv' => 1006,
                'ngaykyluat' => '2023-02-16',
                'lydo' => 'Đi muộn'
            ],
            [
                'manv' => 1007,
                'ngaykyluat' => '2023-02-16',
                'lydo' => 'Vi phạm điều lệ'
            ]
        ];
        DB::table('kyluat')->insert($kyluats);
    }
}
