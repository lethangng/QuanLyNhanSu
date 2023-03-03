<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared(
            'CREATE FUNCTION function_TongTienLuong(CaNhan_id INT, thangnam DATE) RETURNS INT BEGIN
                DECLARE tongtien INT DEFAULT 0;
                DECLARE luongcb INT DEFAULT 0;  
                SELECT LuongCoBan INTO luongcb FROM chucvu JOIN thongtincanhan ON chucvu.id = thongtincanhan.ChucVu_id 
                WHERE thongtincanhan.id = CaNhan_id;
                SELECT (luongcb*HSL+TongTienThuong-TongTienPhat)/(DAYOFMONTH(LAST_DAY(NOW())) * SoNgayLamViec) INTO tongtien FROM luong
                WHERE ThongTinCaNhan_id = CaNhan_id AND MONTH(ThoiGian) = MONTH(thangnam) AND YEAR(ThoiGian) = YEAR(thangnam);  
                RETURN tongtien; 
            END'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `function_TongTienLuong`');
    }
};
