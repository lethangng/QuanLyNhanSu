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
        Schema::create('khenthuong_thongtincanhan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('KhenThuong_id')->unsigned()->nullable();
            $table->bigInteger('ThongTinCaNhan_id')->unsigned()->nullable();
            $table->date('NgayKhenThuong')->nullable();
            $table->bigInteger('TienThuong')->unsigned()->nullable();
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
        Schema::dropIfExists('khenthuong_thongtincanhan');
    }
};
