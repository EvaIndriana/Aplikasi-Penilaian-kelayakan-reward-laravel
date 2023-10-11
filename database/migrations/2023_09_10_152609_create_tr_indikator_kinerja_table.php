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
        Schema::create('tr_indikator_kinerja', function (Blueprint $table) {
            $table->id();
            $table->string('indikator_kinerja_1');
            $table->string('indikator_kinerja_2');
            $table->string('indikator_kinerja_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_indikator_kinerja');
    }
};
