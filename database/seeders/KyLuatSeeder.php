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
                'manv' => 1001,
                'ngaykyluat' => '2023-02-16',
                'lydo' => 'Vi phạm điều lệ'
            ],
            [
                'manv' => 1002,
                'ngaykyluat' => '2023-02-16',
                'lydo' => 'Bỏ giờ'
            ]  
        ];
        DB::table('kyluat')->insert($kyluats);
    }
}
