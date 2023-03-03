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
                'manv' => 1,
                'ngaykhenthuong' => '2023-02-16',
                'lydo' => 'Suất sắc trong thi đua'
            ],
            [
                'manv' => 2,
                'ngaykhenthuong' => '2023-02-16',
                'lydo' => 'Không vi phạm kỷ luật'
            ],
            [
                'manv' => 3,
                'ngaykhenthuong' => '2023-02-16',
                'lydo' => 'Người tốt, việc tốt'
            ]
        ];
        DB::table('khenthuong')->insert($khenthuongs);
    }
}
