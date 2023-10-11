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
        Schema::create('penilaian_fuzzy', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('nilai_kinerja_id')->nullable();
            $table->unsignedBigInteger('nilai_komunikasi_id')->nullable();
            $table->unsignedBigInteger('nilai_loyalitas_id')->nullable();
            $table->date('tgl_input');
            $table->year('tahun_input_reward')->nullable();
            $table->string('status');
            $table->string('status_ket_kinerja');
            $table->string('status_ket_komunikasi');
            $table->string('status_ket_loyalitas');
            $table->float('defuzzyfikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_fuzzy');
    }
};
