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
            'CREATE FUNCTION function_TongTienPhat(CaNhan_id INT, thangnam DATE) RETURNS INT BEGIN
                DECLARE tien INT DEFAULT 0;  
                SELECT SUM(TienPhat) INTO tien FROM kyluat_thongtincanhan
                WHERE ThongTinCaNhan_id = CaNhan_id AND MONTH(NgayKyLuat) = MONTH(thangnam) AND YEAR(NgayKyLuat) = YEAR(thangnam); 
                IF (tien IS null) then set tien = 0; END if; 
                RETURN tien; 
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
        DB::unprepared('DROP FUNCTION `function_TongTienPhat`');
    }
};
