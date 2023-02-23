<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $luongs = [
            [
                'ThongTinCaNhan_id' => 1,
                'HSL' => 3.4
            ],
            [
                'ThongTinCaNhan_id' => 2,
                'HSL' => 3.2
            ],
            [
                'ThongTinCaNhan_id' => 3,
                'HSL' => 3.0
            ]
        ];
        DB::table('luong')->insert($luongs);
    }
}
