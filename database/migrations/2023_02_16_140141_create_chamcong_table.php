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
            $table->bigInteger('ThongTinCaNhan_id')->nullable();
            $table->integer('Ngay')->unsigned()->nullable();
            $table->integer('Thang')->unsigned()->nullable();
            $table->string('NghiPhep')->nullable();
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
