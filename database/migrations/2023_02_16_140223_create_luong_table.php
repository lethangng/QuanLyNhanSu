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
            $table->id();
            $table->char('MaCaNhan', 10)->unique()->nullable();
            $table->float('HSL', 3, 3)->nullable();
            $table->integer('TongSoGioLamViec')->nullable();
            $table->bigInteger('TongTienPhat')->nullable();
            $table->bigInteger('TongTienThuong')->nullable();
            $table->float('TongTienLuong', 10, 3)->nullable();
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
        Schema::dropIfExists('luong');
    }
};
