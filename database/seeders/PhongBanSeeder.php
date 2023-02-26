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
                'MaPhongBan' => 'TC',
                'TenPhongBan' => 'Phòng tài chính'
            ],
            [
                'MaPhongBan' => 'NS',
                'TenPhongBan' => 'Phòng nhân sự'
            ]
        ];
        DB::table('phongban')->insert($phongbans);
    }
}
