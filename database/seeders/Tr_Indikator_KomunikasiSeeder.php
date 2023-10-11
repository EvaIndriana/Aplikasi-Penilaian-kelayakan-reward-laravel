<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tr_Indikator_Komunikasi;

class Tr_Indikator_KomunikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tr_Indikator_Komunikasi::create([
            'indikator_komunikasi_1' => 'Persepsi -  Tindakan yang terjadi di dalam diri seorang individu, mulai dari menerima dorongan hingga individu tersebut menyadari dan memahami sehingga dapat mengenali dirinya sendiri dan lingkungan sekitarnya.',
            'indikator_komunikasi_2' => 'Kredibilitas - Suatu situasi / kondisi yang dapat dipercaya dan dibuktikan.',
            'indikator_komunikasi_3' => 'Ketepatan -  Kemampuan seseorang untuk mengarahkan sesuatu keserangan berdasarkan tujuannya. ',

        ]);
    }
}
