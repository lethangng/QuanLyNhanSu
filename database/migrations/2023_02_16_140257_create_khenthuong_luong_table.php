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
        Schema::create('khenthuong_luong', function (Blueprint $table) {
            $table->bigInteger('MaKhenThuong');
            $table->bigInteger('MaBangLuong');
            $table->text('ChiTietKhenThuong');
            $table->timestamps();
            $table->foreign('MaKhenThuong')->references('MaKhenThuong')->on('khenthuong');
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
        Schema::dropIfExists('khenthuong_luong');
    }
};
