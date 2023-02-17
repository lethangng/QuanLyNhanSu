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
        Schema::create('thongtincanhan', function (Blueprint $table) {
            $table->id();
            $table->string('HoTen', 50)->nullable();
            $table->date('NgaySinh')->nullable();
            $table->char('GioiTinh', 5)->nullable();
            $table->string('CCDD', 12)->unique()->nullable();
            $table->string('DiaChi', 50)->nullable();
            $table->char('MaPhongBan', 10)->nullable();
            $table->char('MaChucVu', 10)->nullable();
            $table->char('MaKhoa', 10)->nullable();
            $table->string('AnhDaiDien')->nullable();
            $table->boolean('TrangThai')->nullable();
            $table->char('TenTaiKhoan', 10)->unique()->nullable();
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
        Schema::dropIfExists('thongtincanhan');
    }
};
