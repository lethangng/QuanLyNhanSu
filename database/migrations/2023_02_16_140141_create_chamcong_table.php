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
        Schema::create('chamcong', function (Blueprint $table) {
            $table->id('MaChamCong');
            $table->char('MaCaNhan', 10);
            $table->date('Ngay');
            $table->time('GioVao')->nullable();
            $table->time('GioRa')->nullable();
            $table->integer('ThoiGianLamViec')->nullable();
            $table->string('TrangThai');
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
        Schema::dropIfExists('chamcong');
    }
};
