<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nhanviens = [
            [
                'tennv' => 'Lê Ngọc Thắng',
                'ngaysinh' => '2002-07-04',
                'gioitinh' => 'Nam',
                'cccd' => '1000',
                'diachi' => 'Hà Nội',
                'quequan' => 'Thái Bình',
                'sdt' => '0123',
                'maphongban' => 2,
                'machucvu' => 3,
                'makhoa' => null,
                'matrangthai' => 1,
                'hsl' => 3.4,
                'bacluong' => null,
                'email' => 'thang@gmail.com'
            ],
            [
                'tennv' => 'Đỗ Hoàng Huy',
                'ngaysinh' => '2002-06-19',
                'gioitinh' => 'Nam',
                'cccd' => '1001',
                'diachi' => 'Hà Nội',
                'quequan' => 'Hải Dương',
                'sdt' => '0123',
                'maphongban' => null,
                'machucvu' => 5,
                'makhoa' => 1,
                'matrangthai' => 2,
                'hsl' => null,
                'bacluong' => 4,
                'email' => 'huy@gmail.com'
            ],
            [
                'tennv' => 'Phạm Văn Thuấn',
                'ngaysinh' => '2002-01-20',
                'gioitinh' => 'Nam',
                'cccd' => '1002',
                'diachi' => 'Hà Nội',
                'quequan' => 'Nam Định',
                'sdt' => '0123',
                'maphongban' => null,
                'machucvu' => 1,
                'makhoa' => 1,
                'matrangthai' => 3,
                'hsl' => null,
                'bacluong' => 6,
                'email' => 'thuan@gmail.com'
            ],
            [
                'tennv' => 'Đỗ Việt Hoàng',
                'ngaysinh' => '2002-01-20',
                'gioitinh' => 'Nam',
                'cccd' => '1003',
                'diachi' => 'Hà Nội',
                'quequan' => 'Sơn La',
                'sdt' => '0123',
                'maphongban' => null,
                'machucvu' => 1,
                'makhoa' => 3,
                'matrangthai' => 4,
                'hsl' => null,
                'bacluong' => 4,
                'email' => 'hoang@gmail.com'
            ],
            [
                'tennv' => 'Vũ Chí Thành',
                'ngaysinh' => '2002-01-20',
                'gioitinh' => 'Nam',
                'cccd' => '1004',
                'diachi' => 'Hà Nội',
                'quequan' => 'Hà Nội',
                'sdt' => '0123',
                'maphongban' => 2,
                'machucvu' => 6,
                'makhoa' => null,
                'matrangthai' => 5,
                'hsl' => 3.0,
                'bacluong' => null,
                'email' => 'thanh@gmail.com'
            ],
            [
                'tennv' => 'Bùi Minh Hải',
                'ngaysinh' => '2002-01-20',
                'gioitinh' => 'Nam',
                'cccd' => '1005',
                'diachi' => 'Hà Nội',
                'quequan' => 'Hà Nội',
                'sdt' => '0123',
                'maphongban' => 2,
                'machucvu' => 6,
                'makhoa' => null,
                'matrangthai' => 5,
                'hsl' => 3.0,
                'bacluong' => null,
                'email' => 'hai@gmail.com'
            ],
            [
                'tennv' => 'Đặng Huy Hùng',
                'ngaysinh' => '2002-01-20',
                'gioitinh' => 'Nam',
                'cccd' => '1006',
                'diachi' => 'Hà Nội',
                'quequan' => 'Hà Nội',
                'sdt' => '0123',
                'maphongban' => 2,
                'machucvu' => 6,
                'makhoa' => null,
                'matrangthai' => 5,
                'hsl' => 3.0,
                'bacluong' => null,
                'email' => 'hung@gmail.com'
            ],
            [
                'tennv' => 'Bá Huân',
                'ngaysinh' => '2002-01-20',
                'gioitinh' => 'Nam',
                'cccd' => '1007',
                'diachi' => 'Hà Nội',
                'quequan' => 'Hà Nội',
                'sdt' => '0123',
                'maphongban' => 2,
                'machucvu' => 6,
                'makhoa' => null,
                'matrangthai' => 5,
                'hsl' => 3.0,
                'bacluong' => null,
                'email' => 'huan@gmail.com'
            ],
            [
                'tennv' => 'Phan Lạc Hải Long',
                'ngaysinh' => '2002-01-20',
                'gioitinh' => 'Nam',
                'cccd' => '1008',
                'diachi' => 'Hà Nội',
                'quequan' => 'Hà Nội',
                'sdt' => '0123',
                'maphongban' => 2,
                'machucvu' => 6,
                'makhoa' => null,
                'matrangthai' => 5,
                'hsl' => 3.0,
                'bacluong' => null,
                'email' => 'hailong@gmail.com'
            ],
            [
                'tennv' => 'Phạm Khánh Long',
                'ngaysinh' => '2002-01-20',
                'gioitinh' => 'Nam',
                'cccd' => '1009',
                'diachi' => 'Hà Nội',
                'quequan' => 'Hà Nội',
                'sdt' => '0123',
                'maphongban' => 2,
                'machucvu' => 6,
                'makhoa' => null,
                'matrangthai' => 5,
                'hsl' => 3.0,
                'bacluong' => null,
                'email' => 'khanhlong@gmail.com'
            ],
            [
                'tennv' => 'Ngô Minh Nam',
                'ngaysinh' => '2002-01-20',
                'gioitinh' => 'Nam',
                'cccd' => '1010',
                'diachi' => 'Hà Nội',
                'quequan' => 'Hà Nội',
                'sdt' => '0123',
                'maphongban' => 2,
                'machucvu' => 6,
                'makhoa' => null,
                'matrangthai' => 5,
                'hsl' => 3.0,
                'bacluong' => null,
                'email' => 'nam@gmail.com'
            ],
            [
                'tennv' => 'Nguyễn Văn Đức',
                'ngaysinh' => '2002-01-20',
                'gioitinh' => 'Nam',
                'cccd' => '1011',
                'diachi' => 'Hà Nội',
                'quequan' => 'Hà Nội',
                'sdt' => '0123',
                'maphongban' => 2,
                'machucvu' => 6,
                'makhoa' => null,
                'matrangthai' => 5,
                'hsl' => 3.0,
                'bacluong' => null,
                'email' => 'duc@gmail.com'
            ]
        ];
        DB::table('nhanvien')->insert($nhanviens);
    }
}
