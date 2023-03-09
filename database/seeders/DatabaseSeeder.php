<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            NhanVienSeeder::class,
            KhenThuongSeeder::class,
            KyLuatSeeder::class,
            UserSeeder::class,
            HopDongSeeder::class,
            TangLuongSeeder::class,
            TrangThaiSeeder::class
        ]);
    }
}
