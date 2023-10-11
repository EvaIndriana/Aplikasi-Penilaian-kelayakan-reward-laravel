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
        Schema::create('tr_indikator_loyalitas', function (Blueprint $table) {
            $table->id();
            $table->string('indikator_loyalitas_1');
            $table->string('indikator_loyalitas_2');
            $table->string('indikator_loyalitas_3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_indikator_loyalitas');
    }
};
