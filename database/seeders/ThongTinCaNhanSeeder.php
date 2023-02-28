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
                'CCCD' => '1000',
                'DiaChi' => 'Hà Nội',
                'QueQuan' => 'Thái Bình',
                'SDT' => '0123',
                'PhongBan_id' => 1,
                'ChucVu_id' => 1,
                'Khoa_id' => 1,
                'TrangThai' => true,
                'User_id' => 1
            ],
            [
                'MaCaNhan' => '101',
                'HoTen' => 'Đỗ Hoàng Huy',
                'NgaySinh' => '2002-06-19',
                'GioiTinh' => 'Nam',
                'CCCD' => '1001',
                'DiaChi' => 'Hà Nội',
                'QueQuan' => 'Hải Dương',
                'SDT' => '0123',
                'PhongBan_id' => 1,
                'ChucVu_id' => 2,
                'Khoa_id' => 1,
                'TrangThai' => true,
                'User_id' => 2
            ],
            [
                'MaCaNhan' => '102',
                'HoTen' => 'Phạm Văn Thuấn',
                'NgaySinh' => '2002-01-20',
                'GioiTinh' => 'Nam',
                'CCCD' => '1002',
                'DiaChi' => 'Hà Nội',
                'QueQuan' => 'Nam Định',
                'SDT' => '0123',
                'PhongBan_id' => 1,
                'ChucVu_id' => 3,
                'Khoa_id' => 1,
                'TrangThai' => false,
                'User_id' => 3
            ],
            [
                'MaCaNhan' => '103',
                'HoTen' => 'Đỗ Việt Hoàng',
                'NgaySinh' => '2002-01-20',
                'GioiTinh' => 'Nam',
                'CCCD' => '1003',
                'DiaChi' => 'Hà Nội',
                'QueQuan' => 'Sơn La',
                'SDT' => '0123',
                'PhongBan_id' => 1,
                'ChucVu_id' => 4,
                'Khoa_id' => 1,
                'TrangThai' => true,
                'User_id' => 4
            ],
            [
                'MaCaNhan' => '104',
                'HoTen' => 'Vũ Chí Thành',
                'NgaySinh' => '2002-01-20',
                'GioiTinh' => 'Nam',
                'CCCD' => '1004',
                'DiaChi' => 'Hà Nội',
                'QueQuan' => 'Hà Nội',
                'SDT' => '0123',
                'PhongBan_id' => 1,
                'ChucVu_id' => 5,
                'Khoa_id' => 1,
                'TrangThai' => false,
                'User_id' => 5
            ]
        ];
        DB::table('thongtincanhan')->insert($thongTinCaNhan);
    }
}
