<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhongBanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phongbans = [
            [
                'maphongban' => 'TC',
                'tenphongban' => 'Phòng tài chính'
            ],
            [
                'maphongban' => 'NS',
                'tenphongban' => 'Phòng nhân sự'
            ],
            [
                'maphongban' => 'HC',
                'tenphongban' => 'Phòng hành chính'
            ],
            [
                'maphongban' => 'CCSV',
                'tenphongban' => 'Phòng công tác sinh viên'
            ],
            [
                'maphongban' => 'QTTB',
                'tenphongban' => 'Phòng quản trị thiết bị'
            ]
        ];
        DB::table('phongban')->insert($phongbans);
    }
}
