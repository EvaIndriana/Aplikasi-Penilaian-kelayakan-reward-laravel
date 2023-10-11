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
        Schema::create('nilai_loyalitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('departments_id');
            // $table->unsignedBigInteger('indikator_komunikasi_id');
            $table->date('tgl_input');
            $table->string('nilai_1');
            $table->string('nilai_2');
            $table->string('nilai_3');
            $table->decimal('total_nilai_loyalitas', 5, 2);
            $table->string('status_data_loyalitas')->default('pending');
            $table->text('catatan_revisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_loyalitas');
    }
};
