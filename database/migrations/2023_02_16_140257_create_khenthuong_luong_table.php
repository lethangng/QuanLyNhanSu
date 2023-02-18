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
        Schema::create('khenthuong_luong', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_KhenThuong')->nullable();
            $table->bigInteger('id_Luong')->nullable();
            $table->text('ChiTietKhenThuong')->nullable();
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
        Schema::dropIfExists('khenthuong_luong');
    }
};
