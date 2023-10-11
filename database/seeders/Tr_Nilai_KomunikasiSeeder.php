<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Tr_Nilai_Komunikasi;

class Tr_Nilai_KomunikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nilaiKomunikasiData = [
            [
                'karyawan_id' => 1,
                'departments_id' => 1,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '45',
                'nilai_2' => '55',
                'nilai_3' => '50',
                'status_data_komunikasi' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_komunikasi' => 47,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 2,
                'departments_id' => 2,
                'tgl_input' => '2023-01-02',
                'nilai_1' => '80',
                'nilai_2' => '85',
                'nilai_3' => '90',
                'status_data_komunikasi' => 'approved',
                'catatan_revisi' => 'null',
                'total_nilai_komunikasi' => 85,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 3,
                'departments_id' => 3,
                'tgl_input' => '2023-01-03',
                'nilai_1' => '80',
                'nilai_2' => '80',
                'nilai_3' => '80',
                'status_data_komunikasi' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_komunikasi' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 4,
                'departments_id' => 4,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '45',
                'nilai_2' => '45',
                'nilai_3' => '15',
                'status_data_komunikasi' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_komunikasi' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 5,
                'departments_id' => 5,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '89',
                'nilai_2' => '80',
                'nilai_3' => '55',
                'status_data_komunikasi' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_komunikasi' => 75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 6,
                'departments_id' => 1,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '25',
                'nilai_2' => '25',
                'nilai_3' => '25',
                'status_data_komunikasi' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_komunikasi' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 7,
                'departments_id' => 2,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '25',
                'nilai_2' => '25',
                'nilai_3' => '25',
                'status_data_komunikasi' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_komunikasi' => 25,
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
                'status_data_komunikasi' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_komunikasi' => 32,
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
                'status_data_komunikasi' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_komunikasi' => 90,
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
                'status_data_komunikasi' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_komunikasi' => 42,
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
                'status_data_komunikasi' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_komunikasi' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Tambahkan data kinerja lainnya sesuai kebutuhan
        ];

        DB::table('nilai_komunikasi')->insert($nilaiKomunikasiData);
    }


}
