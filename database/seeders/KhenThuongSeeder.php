<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KhenThuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $khenThuongs = [
            [
                'TenKhenThuong' => 'Đi làm đầy đủ',
                'TienThuong' => 1000000
            ],
            [
                'TenKhenThuong' => 'Kỷ luật tốt',
                'TienThuong' => 300000
            ],
            [
                'TenKhenThuong' => 'Suất sắc trong công việc',
                'TienThuong' => 500000
            ]
        ];
        DB::table('khenthuong')->insert($khenThuongs);
    }
}
