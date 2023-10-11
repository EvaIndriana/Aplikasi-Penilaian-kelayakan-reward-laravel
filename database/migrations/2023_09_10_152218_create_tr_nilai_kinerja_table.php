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
        Schema::create('tr_nilai_kinerja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karyawan_id');
            // $table->unsignedBigInteger('indikator_komunikasi_id');
            $table->unsignedBigInteger('departments_id');
            $table->date('tgl_input');
            $table->string('nilai_1');
            $table->string('nilai_2');
            $table->string('nilai_3');
            $table->string('status_data_kinerja')->default('pending');
            $table->text('catatan_revisi')->nullable();
            $table->float('total_nilai_kinerja'); // Sesuaikan tipe data dengan kebutuhan Anda

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_nilai_kinerja');
    }
};
