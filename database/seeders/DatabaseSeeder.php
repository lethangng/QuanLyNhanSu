<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KhenThuong;
use App\Models\ThongTinCaNhan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ChucVuSeeder::class,
            KhoaSeeder::class,
            PhongBanSeeder::class,
            KyLuatSeeder::class,
            LuongSeeder::class,
            ThongTinCaNhanSeeder::class,
            KhenThuongSeeder::class,
            KhenThuong_ThongTinCaNhanSeeder::class,
            KyLuat_ThongTinCaNhanSeeder::class,
            UserSeeder::class,
            ChamCongSeeder::class
        ]);
    }
}
