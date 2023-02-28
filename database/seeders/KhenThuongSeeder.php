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
                'MaKhenThuong' => 'KT01',
                'TenKhenThuong' => 'Đi làm đầy đủ'
            ],
            [
                'MaKhenThuong' => 'KT02',
                'TenKhenThuong' => 'Kỷ luật tốt'
            ],
            [
                'MaKhenThuong' => 'KT03',
                'TenKhenThuong' => 'Suất sắc trong công việc'
            ]
        ];
        DB::table('khenthuong')->insert($khenThuongs);
    }
}
