<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kyluat_thongtincanhan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('KyLuat_id')->unsigned()->nullable();
            $table->bigInteger('ThongTinCaNhan_id')->unsigned()->nullable();
            $table->date('NgayKyLuat')->nullable();
            $table->bigInteger('TienPhat')->unsigned()->nullable();
            $table->text('LyDo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kyluat_thongtincanhan');
    }
};
