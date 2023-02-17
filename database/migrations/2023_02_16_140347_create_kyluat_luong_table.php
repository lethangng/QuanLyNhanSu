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
        Schema::create('kyluat_luong', function (Blueprint $table) {
            $table->bigInteger('MaKyLuat');
            $table->bigInteger('MaBangLuong');
            $table->text('ChiTietKyLuat');
            $table->timestamps();
            $table->foreign('MaKyLuat')->references('MaKyLuat')->on('kyluat');
            $table->foreign('MaBangLuong')->references('MaBangLuong')->on('luong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kyluat_luong');
    }
};
