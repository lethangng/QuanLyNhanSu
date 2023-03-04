<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->id()->startingValue(1001);
            $table->string('tennv')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('gioitinh')->nullable();
            $table->string('cccd')->unique()->nullable();
            $table->string('diachi')->nullable();
            $table->string('sdt')->nullable();
            $table->string('quequan')->nullable();
            $table->bigInteger('maphongban')->unsigned()->nullable();
            $table->bigInteger('machucvu')->unsigned()->nullable();
            $table->bigInteger('makhoa')->unsigned()->nullable();
            $table->string('anhdaidien')->nullable();
            $table->string('trangthai')->nullable();
            $table->string('email')->nullable();
            $table->float('hsl')->nullable();
            $table->integer('bacluong')->nullable();
            $table->timestamps();
        });
        // DB::statement("ALTER TABLE nhanvien AUTO_INCREMENT = 1000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
};
