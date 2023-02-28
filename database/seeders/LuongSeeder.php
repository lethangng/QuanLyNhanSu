<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $luongs = [
            [
                'ThongTinCaNhan_id' => 1,
                'HSL' => 3.4,
                'ThoiGian' => '2023-02-16',
                'SoNgayLamViec' => 28,
                'TongTienPhat' => 300000,
                'TongTienThuong' => 500000,
                'TongTienLuong' => 10000000
            ],
            [
                'ThongTinCaNhan_id' => 2,
                'HSL' => 3.2,
                'ThoiGian' => '2023-02-16',
                'SoNgayLamViec' => 28,
                'TongTienPhat' => 400000,
                'TongTienThuong' => 300000,
                'TongTienLuong' => 1000000
            ],
            [
                'ThongTinCaNhan_id' => 3,
                'HSL' => 3.0,
                'ThoiGian' => '2023-02-16',
                'SoNgayLamViec' => 28,
                'TongTienPhat' => 300000,
                'TongTienThuong' => 200000,
                'TongTienLuong' => 500000
            ],
            [
                'ThongTinCaNhan_id' => 4,
                'HSL' => 3.0,
                'ThoiGian' => '2023-02-16',
                'SoNgayLamViec' => 28,
                'TongTienPhat' => 300000,
                'TongTienThuong' => 200000,
                'TongTienLuong' => 500000
            ],
            [
                'ThongTinCaNhan_id' => 5,
                'HSL' => 3.0,
                'ThoiGian' => '2023-02-16',
                'SoNgayLamViec' => 28,
                'TongTienPhat' => 300000,
                'TongTienThuong' => 200000,
                'TongTienLuong' => 500000
            ]
        ];
        DB::table('luong')->insert($luongs);
    }
}
