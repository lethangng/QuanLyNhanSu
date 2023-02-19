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
            $table->string('MaCaNhan')->unique()->nullable();
            $table->string('HoTen', 50)->nullable();
            $table->date('NgaySinh')->nullable();
            $table->string('GioiTinh', 5)->nullable();
            $table->string('CCDD', 12)->unique()->nullable();
            $table->string('DiaChi', 50)->nullable();
            $table->string('MaPhongBan', 10)->nullable();
            $table->string('MaChucVu', 10)->nullable();
            $table->string('MaKhoa', 10)->nullable();
            $table->string('AnhDaiDien')->nullable();
            $table->boolean('TrangThai')->nullable();
            $table->string('User_id', 10)->unique()->nullable();
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
