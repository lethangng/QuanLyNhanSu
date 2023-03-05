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
        Schema::create('tangluong', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('manv')->unsigned()->nullable();
            $table->date('ngaytangluong')->nullable();
            $table->string('lydo')->nullable();
            $table->string('chitiettangluong')->nullable();
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
        Schema::dropIfExists('tangluong');
    }
};
