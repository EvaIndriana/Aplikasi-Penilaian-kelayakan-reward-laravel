<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tr_Indikator_Loyalitas;

class Tr_Indikator_LoyalitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tr_Indikator_Loyalitas::create([
            'indikator_loyalitas_1' => 'Tetap bertahan dalam organisasi.',
            'indikator_loyalitas_2' => 'Mau mengorbankan kepentingan pribadi demi kepentingan organisasi/perusahaan.',
            'indikator_loyalitas_3' => 'Menawarkan saran-saran untuk perbaikan',

        ]);
    }
}
