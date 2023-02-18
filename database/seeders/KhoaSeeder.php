<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $khoas = [
            [
                'MaKhoa' => 'CNTT',
                'TenKhoa' => 'Khoa công nghệ thông tin'
            ],
            [
                'MaKhoa' => 'KT',
                'TenKhoa' => 'Khoa kinh tế'
            ],
            [
                'MaKhoa' => 'CT',
                'TenKhoa' => 'Khoa công trình'
            ],
            [
                'MaKhoa' => 'CK',
                'TenKhoa' => 'Khoa cơ khí'
            ],
            [
                'MaKhoa' => 'MT',
                'TenKhoa' => 'Khoa hóa và môi trường'
            ],
            [
                'MaKhoa' => 'DT',
                'TenKhoa' => 'Khoa điện tử'
            ]
        ];
        DB::table('khoa')->insert($khoas);
    }
}
