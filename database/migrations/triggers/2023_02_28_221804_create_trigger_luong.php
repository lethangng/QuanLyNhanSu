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
            'CREATE TRIGGER insert_canhan AFTER INSERT ON `thongtincanhan` FOR EACH ROW
            BEGIN
                INSERT INTO luong (`ThongTinCaNhan_id`, `HSL`) VALUES (NEW.id, 3.00);
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `insert_canhan`');
    }
};
