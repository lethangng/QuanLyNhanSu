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
        Schema::create('kyluat', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('manv')->unsigned()->nullable();
            $table->date('ngaykyluat')->nullable();
            $table->text('lydo')->nullable();
            $table->string('chitietkyluat')->nullable();
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
        Schema::dropIfExists('kyluat');
    }
};
