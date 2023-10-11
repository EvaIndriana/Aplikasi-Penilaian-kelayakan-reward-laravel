<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tr_Nilai_KinerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nilaiKinerjaData = [
            [
                'karyawan_id' => 1,
                'departments_id' => 1,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '65',
                'nilai_2' => '25',
                'nilai_3' => '20',
                'status_data_kinerja' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_kinerja' => 37,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 2,
                'departments_id' => 2,
                'tgl_input' => '2023-01-02',
                'nilai_1' => '80',
                'nilai_2' => '85',
                'nilai_3' => '84',
                'status_data_kinerja' => 'approved',
                'catatan_revisi' => 'null',
                'total_nilai_kinerja' => 83,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 3,
                'departments_id' => 3,
                'tgl_input' => '2023-01-03',
                'nilai_1' => '90',
                'nilai_2' => '90',
                'nilai_3' => '90',
                'status_data_kinerja' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_kinerja' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 4,
                'departments_id' => 4,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '45',
                'nilai_2' => '34',
                'nilai_3' => '34',
                'status_data_kinerja' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_kinerja' => 38,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 5,
                'departments_id' => 5,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '56',
                'nilai_2' => '66',
                'nilai_3' => '78',
                'status_data_kinerja' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_kinerja' => 67,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'karyawan_id' => 6,
                'departments_id' => 1,
                'tgl_input' => '2023-01-01',
                'nilai_1' => '45',
                'nilai_2' => '25',
                'nilai_3' => '24',
                'status_data_kinerja' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_kinerja' => 31,
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
                'status_data_kinerja' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_kinerja' => 43,
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
                'status_data_kinerja' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_kinerja' => 32,
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
                'status_data_kinerja' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_kinerja' => 90,
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
                'status_data_kinerja' => 'approved',
                'catatan_revisi' => null,
                'total_nilai_kinerja' => 42,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Tambahkan data kinerja lainnya sesuai kebutuhan
        ];

        DB::table('nilai_kinerja')->insert($nilaiKinerjaData);
    }
    }

