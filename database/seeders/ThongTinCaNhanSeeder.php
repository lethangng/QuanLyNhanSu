<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThongTinCaNhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $thongTinCaNhan = [
            [
                'MaCaNhan' => '100',
                'HoTen' => 'Lê Ngọc Thắng',
                'NgaySinh' => '2002-07-04',
                'GioiTinh' => 'Nam',
                'DiaChi' => 'Thái Bình'
            ],
            [
                'MaCaNhan' => '101',
                'HoTen' => 'Đỗ Hoàng Huy',
                'NgaySinh' => '2002-06-19',
                'GioiTinh' => 'Nam',
                'DiaChi' => 'Hải Dương'
            ],
            [
                'MaCaNhan' => '102',
                'HoTen' => 'Phạm Văn Thuấn',
                'NgaySinh' => '2002-01-20',
                'GioiTinh' => 'Nam',
                'DiaChi' => 'Nam Định'
            ]
        ];
        DB::table('thongtincanhan')->insert($thongTinCaNhan);
    }
}
