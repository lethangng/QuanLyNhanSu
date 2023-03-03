<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NghiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nghi = [
            [
                'macanhan' => 1,
                'ngaynghi' => '2023-02-16',
                'lydo' => 'Đi công tác'
            ],
            [
                'macanhan' => 2,
                'ngaynghi' => '2023-02-16',
                'lydo' => 'Nghỉ đẻ'
            ],
            [
                'macanhan' => 3,
                'ngaynghi' => '2023-02-16',
                'lydo' => 'Nghỉ hẳn'
            ]
        ];
        DB::table('nghi')->insert($nghi);
    }
}
