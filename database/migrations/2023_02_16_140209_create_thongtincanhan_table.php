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
            $table->string('HoTen')->nullable();
            $table->date('NgaySinh')->nullable();
            $table->string('GioiTinh')->nullable();
            $table->string('CCCD')->unique()->nullable();
            $table->string('DiaChi')->nullable();
            $table->bigInteger('PhongBan_id')->unsigned()->nullable();
            $table->bigInteger('ChucVu_id')->unsigned()->nullable();
            $table->bigInteger('Khoa_id')->unsigned()->nullable();
            $table->string('AnhDaiDien')->nullable();
            $table->boolean('TrangThai')->nullable();
            $table->bigInteger('User_id')->unsigned()->nullable();
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
