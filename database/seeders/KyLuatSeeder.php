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
                'MaKyLuat' => 'KL01',
                'TenKyLuat' => 'Đi muộn 5 lần'
            ], 
            [
                'MaKyLuat' => 'KL02',
                'TenKyLuat' => 'Nghỉ làm 3 ngày'
            ]
        ];
        DB::table('kyluat')->insert($kyluats);
    }
}
