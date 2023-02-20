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
        Schema::create('kyluat_luong', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('KyLuat_id')->unsigned()->nullable();
            $table->bigInteger('Luong_id')->unsigned()->nullable();
            $table->text('ChiTietKyLuat')->nullable();
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
        Schema::dropIfExists('kyluat_luong');
    }
};
