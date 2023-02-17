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
            $table->char('MaCaNhan', 10)->primary();
            $table->string('HoTen', 50);
            $table->date('NgaySinh');
            $table->char('GioiTinh', 5);
            $table->string('CCDD', 12)->unique();
            $table->string('DiaChi', 50);
            $table->char('MaPhongBan', 10)->nullable();
            $table->char('MaChucVu', 10);
            $table->char('MaKhoa', 10)->nullable();
            $table->string('AnhDaiDien')->nullable();
            $table->boolean('TrangThai');
            $table->char('TenTaiKhoan', 10)->unique();
            $table->timestamps();
            $table->foreign('TenTaiKhoan')->references('TenTaiKhoan')->on('taikhoan');
            $table->foreign('MaPhongBan')->references('MaPhongBan')->on('phongban');
            $table->foreign('MaChucVu')->references('MaChucVu')->on('chucvu');
            $table->foreign('MaKhoa')->references('MaKhoa')->on('khoa');
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
