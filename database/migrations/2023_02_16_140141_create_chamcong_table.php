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
            $table->id();
            $table->string('MaCaNhan', 10)->nullable();
            $table->date('Ngay')->nullable();
            $table->time('GioVao')->nullable();
            $table->time('GioRa')->nullable();
            $table->integer('ThoiGianLamViec')->nullable();
            $table->string('TrangThai')->nullable();
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
        Schema::dropIfExists('chamcong');
    }
};
