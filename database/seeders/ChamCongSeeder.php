<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChamCongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chamCongs = [
            [
                'ThongTinCaNhan_id' => 2,
                'ThoiGian' => '2023-02-16 7:55:11',
                'DiMuon' => true
            ],
            [
                'ThongTinCaNhan_id' => 3,
                'ThoiGian' => '2023-02-16 7:04:11',
                'DiMuon' => false
            ],
            [
                'ThongTinCaNhan_id' => 4,
                'ThoiGian' => '2023-02-16 7:05:11',
                'DiMuon' => false
            ],
            [
                'ThongTinCaNhan_id' => 5,
                'ThoiGian' => '2023-02-16 6:50:11',
                'DiMuon' => false
            ],
            [
                'ThongTinCaNhan_id' => 2,
                'ThoiGian' => '2023-02-16 11:04:11',
                'DiMuon' => true
            ]
        ];
        DB::table('chamcong')->insert($chamCongs);
    }
}
