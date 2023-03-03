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
            'CREATE PROCEDURE update_luong()
            BEGIN
                DECLARE is_done INT DEFAULT 0;
                DECLARE canhan_id INT;
                DECLARE songaylamviec, tongtienthuong, tongtienphat INT DEFAULT 0; 
                DECLARE cur_canhan CURSOR FOR SELECT id FROM thongtincanhan;
                DECLARE CONTINUE HANDLER FOR NOT FOUND
                SET  is_done = 1;
                OPEN  cur_canhan;
                get_list:LOOP
                FETCH  cur_canhan INTO canhan_id;
                IF is_done = 1 THEN LEAVE get_list;
                END IF;
                SELECT function_SoNgayLamViec(canhan_id, thoigian) INTO songaylamviec;
                SELECT function_TongTienThuong(canhan_id, thoigian) INTO tongtienthuong;
                SELECT function_TongTienPhat(canhan_id, thoigian) INTO tongtienphat;
                INSERT INTO luong(ThongTinCaNhan_id, ThoiGian, SoNgayLamViec, TongTienPhat, TongTienThuong) 
                VALUES (canhan_id, thoigian, songaylamviec, tongtienphat, tongtienthuong);
                END LOOP get_list;	
                CLOSE cur_canhan;
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
        DB::unprepared('DROP PROCEDURE `update_luong`');
    }
};
