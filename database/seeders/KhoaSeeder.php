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
                'makhoa' => 'CNTT',
                'tenkhoa' => 'Khoa công nghệ thông tin'
            ],
            [
                'makhoa' => 'KT',
                'tenkhoa' => 'Khoa kinh tế'
            ],
            [
                'makhoa' => 'CT',
                'tenkhoa' => 'Khoa công trình'
            ],
            [
                'makhoa' => 'CK',
                'tenkhoa' => 'Khoa cơ khí'
            ],
            [
                'makhoa' => 'MT',
                'tenkhoa' => 'Khoa hóa và môi trường'
            ],
            [
                'makhoa' => 'DT',
                'tenkhoa' => 'Khoa điện tử'
            ]
        ];
        DB::table('khoa')->insert($khoas);
    }
}
