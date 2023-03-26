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
        $khenthuongs = [
            [
                'manv' => 1001,
                'ngaykhenthuong' => '2021-02-16',
                'lydo' => 'Suất sắc trong thi đua'
            ],
            [
                'manv' => 1002,
                'ngaykhenthuong' => '2022-02-16',
                'lydo' => 'Không vi phạm kỷ luật'
            ],
            [
                'manv' => 1003,
                'ngaykhenthuong' => '2023-02-16',
                'lydo' => 'Người tốt, việc tốt'
            ],
            [
                'manv' => 1003,
                'ngaykhenthuong' => '2023-02-16',
                'lydo' => 'Nhân viên suất sắc'
            ],
            [
                'manv' => 1004,
                'ngaykhenthuong' => '2023-02-16',
                'lydo' => 'Làm việc tích cực tháng 1'
            ],
            [
                'manv' => 1005,
                'ngaykhenthuong' => '2023-02-16',
                'lydo' => 'Làm việc tích cực tháng 1'
            ],
            [
                'manv' => 1006,
                'ngaykhenthuong' => '2023-02-16',
                'lydo' => 'Làm việc tích cực tháng 1'
            ]
        ];
        DB::table('khenthuong')->insert($khenthuongs);
    }
}
