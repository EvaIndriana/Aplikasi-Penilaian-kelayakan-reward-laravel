<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tr_Nilai_Loyalitas;

class Tr_Nilai_LoyalitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nilaiLoyalitasaData = [
            [
                'karyawan_id' => 1,
                'departments_id' => 1,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '25',
                'nilai_2' => '55',
                'nilai_3' => '45',
                'status_data_loyalitas' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_loyalitas' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 2,
                'departments_id' => 2,
                'tgl_input' => '2023-01-02',
                'nilai_1' => '55',
                'nilai_2' => '45',
                'nilai_3' => '30',
                'status_data_loyalitas' => 'approved',
                'catatan_revisi' => 'null',
                'total_nilai_loyalitas' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 3,
                'departments_id' => 3,
                'tgl_input' => '2023-01-03',
                'nilai_1' => '90',
                'nilai_2' => '90',
                'nilai_3' => '100',
                'status_data_loyalitas' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_loyalitas' => 93,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 4,
                'departments_id' => 4,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '45',
                'nilai_2' => '35',
                'nilai_3' => '25',
                'status_data_loyalitas' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_loyalitas' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 5,
                'departments_id' => 5,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '45',
                'nilai_2' => '45',
                'nilai_3' => '55',
                'status_data_loyalitas' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_loyalitas' => 48,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 6,
                'departments_id' => 1,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '56',
                'nilai_2' => '15',
                'nilai_3' => '24',
                'status_data_loyalitas' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_loyalitas' => 32,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 7,
                'departments_id' => 2,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '55',
                'nilai_2' => '45',
                'nilai_3' => '30',
                'status_data_loyalitas' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_loyalitas' => 43,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 8,
                'departments_id' => 3,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '56',
                'nilai_2' => '15',
                'nilai_3' => '24',
                'status_data_loyalitas' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_loyalitas' => 32,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 9,
                'departments_id' => 4,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '90',
                'nilai_2' => '90',
                'nilai_3' => '90',
                'status_data_loyalitas' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_loyalitas' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 10,
                'departments_id' => 5,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '25',
                'nilai_2' => '15',
                'nilai_3' => '25',
                'status_data_loyalitas' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_loyalitas' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 1,
                'departments_id' => 1,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '65',
                'nilai_2' => '25',
                'nilai_3' => '20',
                'status_data_loyalitas' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_loyalitas' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Tambahkan data kinerja lainnya sesuai kebutuhan
        ];

        DB::table('nilai_loyalitas')->insert($nilaiLoyalitasaData);
    }
}
