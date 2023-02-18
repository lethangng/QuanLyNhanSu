<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KyLuatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kyluats = [
            [
                'TenKyLuat' => 'Đi muộn 5 lần',
                'TienPhat' => 10
            ], // Đi muộn phạt 10% lương
            [
                'TenKyLuat' => 'Nghỉ làm 1 ngày',
                'TienPhat' => 5
            ]
        ];
        DB::table('kyluat')->insert($kyluats);
    }
}
