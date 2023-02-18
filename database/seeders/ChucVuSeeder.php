<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chucvus = [
            [
                'MaChucVu' => 'HC',
                'TenChucVu' => 'Hiệu trưởng',
                'LuongCoBan' => 100000000
            ],
            [
                'MaChucVu' => 'GV',
                'TenChucVu' => 'Giảng viên',
                'LuongCoBan' => 10000000
            ],
            [
                'MaChucVu' => 'NV',
                'TenChucVu' => 'Nhân viên',
                'LuongCoBan' => 1000000
            ],
            [
                'MaChucVu' => 'NVNS',
                'TenChucVu' => 'Nhân viên phòng nhân sự',
                'LuongCoBan' => 10000000
            ],
            [
                'MaChucVu' => 'NVTC',
                'TenChucVu' => 'Nhân viên phòng tài chính',
                'LuongCoBan' => 10000000
            ]
        ];
        DB::table('chucvu')->insert($chucvus);
    }
}
