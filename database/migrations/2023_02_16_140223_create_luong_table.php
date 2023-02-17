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
        Schema::create('luong', function (Blueprint $table) {
            $table->id('MaBangLuong');
            $table->char('MaCaNhan', 10)->unique();
            $table->float('HSL', 3, 3);
            $table->integer('TongSoGioLamViec');
            $table->integer('TongTienPhat');
            $table->integer('TongTienThuong');
            $table->float('TongTienLuong', 10, 3);
            $table->timestamps();
            $table->foreign('MaCaNhan')->references('MaCaNhan')->on('thongtincanhan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('luong');
    }
};
