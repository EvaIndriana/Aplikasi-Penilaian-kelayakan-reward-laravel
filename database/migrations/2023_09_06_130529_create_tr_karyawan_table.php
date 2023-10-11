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
        Schema::create('tr_karyawan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departments_id');
            $table->string('nama_karyawan');
            $table->string('email');
            $table->string('nik_karyawan')->unique();
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('status');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('status_pekerjaan')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('status_aktif_karyawan')->nullable();
            $table->date('tanggal_nonaktif')->nullable();
            $table->timestamps();

            $table->foreign('departments_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tr_karyawan');
    }
};
