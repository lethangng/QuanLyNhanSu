<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chucvus = [
            [
                'machucvu' => 'GV',
                'tenchucvu' => 'Giảng viên'
            ],
            [
                'machucvu' => 'NV',
                'tenchucvu' => 'Nhân viên'
            ],
            [
                'machucvu' => 'CP',
                'tenchucvu' => 'Trưởng phòng'
            ],
            [
                'machucvu' => 'PP',
                'tenchucvu' => 'Phó phòng'
            ],
            [
                'machucvu' => 'TK',
                'tenchucvu' => 'Trưởng khoa'
            ],
            [
                'machucvu' => 'PK',
                'tenchucvu' => 'Phó khoa'
            ],
            [
                'machucvu' => 'TBM',
                'tenchucvu' => 'Trưởng bộ môn'
            ],
            [
                'machucvu' => 'PBM',
                'tenchucvu' => 'Phó bộ môn'
            ]
        ];
        DB::table('chucvu')->insert($chucvus);
    }
}
