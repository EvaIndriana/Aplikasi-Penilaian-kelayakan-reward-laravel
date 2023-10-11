<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PenilaianFuzzySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawanIds = range(1, 10);

        // Generate data for 2021
        foreach ($karyawanIds as $karyawanId) {
            $this->generateData($karyawanId, 2021);
        }

        // Generate data for 2022
        foreach ($karyawanIds as $karyawanId) {
            $this->generateData($karyawanId, 2022);
        }

        // Generate data for 2023
        foreach ($karyawanIds as $karyawanId) {
            $this->generateData($karyawanId, 2023);
        }
    }

    private function generateData($karyawanId, $tahun)
    {
        $nilaiKinerja = rand(1, 100);
        $nilaiKomunikasi = rand(1, 100);
        $nilaiLoyalitas = rand(1, 100);

        $totalNilai = ($nilaiKinerja + $nilaiKomunikasi + $nilaiLoyalitas) / 3;

        $status = 'Tidak Layak';
        if ($totalNilai >= 40 && $totalNilai < 80) {
            $status = 'Dipertimbangkan';
        } elseif ($totalNilai >= 80) {
            $status = 'Layak';
        }

        DB::table('penilaian_fuzzy')->insert([
            'karyawan_id' => $karyawanId,
            'nilai_kinerja_id' => $nilaiKinerja,
            'nilai_komunikasi_id' => $nilaiKomunikasi,
            'nilai_loyalitas_id' => $nilaiLoyalitas,
            'tgl_input' => Carbon::now(),
            'tahun_input_reward' => $tahun,
            'status' => $status,
            'status_ket_kinerja' => 'Keterangan Kinerja',
            'status_ket_komunikasi' => 'Keterangan Komunikasi',
            'status_ket_loyalitas' => 'Keterangan Loyalitas',
            'defuzzyfikasi' => $totalNilai,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
