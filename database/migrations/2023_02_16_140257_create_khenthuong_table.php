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
        Schema::create('khenthuong', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('manv')->unsigned()->nullable();
            $table->date('ngaykhenthuong')->nullable();
            $table->text('lydo')->nullable();
            $table->string('chitietkhenthuong')->nullable();
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
        Schema::dropIfExists('khenthuong');
    }
};
