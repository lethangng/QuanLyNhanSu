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
            $table->bigInteger('ThongTinCaNhan_id')->unsigned()->nullable();
            $table->float('HSL')->nullable();
            $table->integer('Thang')->unsigned()->nullable();
            $table->bigInteger('TongTienPhat')->unsigned()->nullable();
            $table->bigInteger('TongTienThuong')->unsigned()->nullable();
            $table->bigInteger('TongTienLuong')->unsigned()->nullable();
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
