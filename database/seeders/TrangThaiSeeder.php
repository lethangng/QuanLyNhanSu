<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrangThaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trangthais = [
            [
                'matrangthai' => 'NV',
                'tentrangthai' => 'Nghỉ việc'
            ],
            [
                'matrangthai' => 'TS',
                'tentrangthai' => 'Thai sản 6 tháng'
            ],
            [
                'matrangthai' => 'CT',
                'tentrangthai' => 'Công tác'
            ],
            [
                'matrangthai' => 'DHD',
                'tentrangthai' => 'Đang hoạt động'
            ],
            [
                'matrangthai' => 'TV',
                'tentrangthai' => 'Thử việc'
            ]
        ];
        DB::table('trangthai')->insert($trangthais);
    }
}
