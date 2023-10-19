<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nhansu_id')->nullable();
            $table->unsignedBigInteger('tkqc_id')->nullable();
            $table->unsignedBigInteger('hang_id')->nullable();
            $table->string('tongchitieu')->nullable();
            $table->integer('mes')->nullable();
            $table->integer('cmt')->nullable();
            $table->integer('tt')->nullable();
            $table->integer('don')->nullable();
            $table->foreign('nhansu_id')->references('id')->on('nhan_sus');
            $table->foreign('tkqc_id')->references('id')->on('t_k_q_c_s');
            $table->foreign('hang_id')->references('id')->on('hangs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dons');
    }
};
