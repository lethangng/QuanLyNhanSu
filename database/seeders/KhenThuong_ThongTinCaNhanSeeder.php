<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhenThuong_ThongTinCaNhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dsKhenThuong = [
            [
                'KhenThuong_id' => 1,
                'ThongTinCaNhan_id' => 1,
                'NgayKhenThuong' => '2023-02-16',
                'TienThuong' => 500000,
                'LyDo' => 'Đi làm đầy đủ tháng này'
            ],
            [
                'KhenThuong_id' => 1,
                'ThongTinCaNhan_id' => 2,
                'NgayKhenThuong' => '2023-02-16',
                'TienThuong' => 300000,
                'LyDo' => 'Đi làm đầy đủ tháng này'
            ],
            [
                'KhenThuong_id' => 2,
                'ThongTinCaNhan_id' => 1,
                'NgayKhenThuong' => '2023-02-16',
                'TienThuong' => 100000,
                'LyDo' => 'Kỷ luật tốt trong tháng'
            ]
        ];
        DB::table('khenthuong_thongtincanhan')->insert($dsKhenThuong);
    }
}
