<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TangLuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tangluongs = [
            [
                'manv' => 1,
                'ngaytangluong' => '2023-02-16',
                'lydo' => 'Tăng bậc lương do 3 năm tăng'
            ],
            [
                'manv' => 2,
                'ngaytangluong' => '2023-02-16',
                'lydo' => 'Tăng bậc lương sớm hơn'
            ],
            [
                'manv' => 3,
                'ngaytangluong' => '2023-02-16',
                'lydo' => 'Tăng bậc lương muộn do bị kỷ luật'
            ],
            [
                'manv' => 4,
                'ngaytangluong' => '2023-02-16',
                'lydo' => 'Giảm hsl do bị kỷ luật'
            ],
            [
                'manv' => 5,
                'ngaytangluong' => '2023-02-16',
                'lydo' => 'Giảm bậc lương do bị kỷ luật'
            ]
        ];
        DB::table('tangluong')->insert($tangluongs);
    }
}
