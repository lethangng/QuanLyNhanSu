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
        Schema::create('chucvu', function (Blueprint $table) {
            $table->id();
            $table->char('MaChucVu', 10)->unique()->nullable();
            $table->string('TenChucVu', 50)->nullable();
            $table->float('LuongCoBan', 10, 2)->nullable(); // Kieu float 10 số trước dấy phẩy, 2 số sau dấu phẩy
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
        Schema::dropIfExists('chucvu');
    }
};
