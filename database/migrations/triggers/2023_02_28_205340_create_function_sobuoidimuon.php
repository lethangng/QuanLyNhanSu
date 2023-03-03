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
            'CREATE FUNCTION function_SoBuoiDiMuon(CaNhan_id INT, thangnam DATE) RETURNS INT BEGIN
                DECLARE songay INT DEFAULT 0;  
                SELECT COUNT(ThongTinCaNhan_id) INTO songay FROM chamcong 
                WHERE ThongTinCaNhan_id = CaNhan_id AND MONTH(ThoiGian) = MONTH(thangnam) AND YEAR(ThoiGian) = YEAR(thangnam) AND DiMuon = true;
                IF (songay IS null) then set songay = 0; END if;  
                RETURN songay; 
            END;'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION `function_SoBuoiDiMuon`');
    }
};
