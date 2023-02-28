<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KyLuat_ThongTinCaNhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dsKyLuat = [
            [
                'KyLuat_id' => 1,
                'ThongTinCaNhan_id' => 1,
                'NgayKyLuat' => '2023-02-16',
                'TienPhat' => 500000,
                'LyDo' => 'Đi làm muộn 5 lần tháng này'
            ],
            [
                'KyLuat_id' => 1,
                'ThongTinCaNhan_id' => 2,
                'NgayKyLuat' => '2023-02-16',
                'TienPhat' => 500000,
                'LyDo' => 'Đi làm muộn 5 lần tháng này'
            ],
            [
                'KyLuat_id' => 2,
                'ThongTinCaNhan_id' => 1,
                'NgayKyLuat' => '2023-02-16',
                'TienPhat' => 500000,
                'LyDo' => 'Nghỉ làm 3 lần tháng này'
            ]
        ];
        DB::table('kyluat_thongtincanhan')->insert($dsKyLuat);
    }
}
