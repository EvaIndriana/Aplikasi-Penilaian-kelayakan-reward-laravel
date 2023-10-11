<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tr_Karyawan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class Tr_KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawanData = [
            [
                'departments_id' => 1,
                'nama_karyawan' => 'Mursita Usada',
                'email' => 'mursita@gmail.com',
                'nik_karyawan' => 'NIK001',
                'alamat' => 'Jl.Pesanggrahan timur',
                'no_hp' => '081234567890',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'status_pekerjaan' => 'Karyawan Tetap',
                'pendidikan' => 'Sarjana',
                'foto' => null,
                'status_aktif_karyawan' => true,
                'tanggal_nonaktif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departments_id' => 2,
                'nama_karyawan' => 'Yance Pratama',
                'email' => 'yance@gmail.com',
                'nik_karyawan' => 'NIK002',
                'alamat' => 'Jl. Angsa Berdansa',
                'no_hp' => '082345678901',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Kristen',
                'status' => 'Aktif',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1988-05-15',
                'status_pekerjaan' => 'Karyawan Kontrak',
                'pendidikan' => 'Diploma',
                'foto' => null,
                'status_aktif_karyawan' => true,
                'tanggal_nonaktif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departments_id' => 3,
                'nama_karyawan' => 'Ina Maheswara',
                'email' => 'maheswara@gmail.com',
                'nik_karyawan' => 'NIK003',
                'alamat' => 'Jl. Letnal Sudirman',
                'no_hp' => '083456789012',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1992-08-20',
                'status_pekerjaan' => 'Karyawan Kontrak',
                'pendidikan' => 'Diploma',
                'foto' => null,
                'status_aktif_karyawan' => true,
                'tanggal_nonaktif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departments_id' => 4,
                'nama_karyawan' => 'Silvia Pratama',
                'email' => 'silva@gmail.com',
                'nik_karyawan' => 'NIK004',
                'alamat' => 'Jl. Baros Utara',
                'no_hp' => '084567890123',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1985-03-10',
                'status_pekerjaan' => 'Karyawan Kontrak',
                'pendidikan' => 'Magister',
                'foto' => null,
                'status_aktif_karyawan' => true,
                'tanggal_nonaktif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departments_id' => 5,
                'nama_karyawan' => 'Hesti Novitasari',
                'email' => 'hesti@gmail.com',
                'nik_karyawan' => 'NIK005',
                'alamat' => 'Jl.Kadudampit',
                'no_hp' => '085678901234',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '1993-11-25',
                'status_pekerjaan' => 'Karyawan Kontrak',
                'pendidikan' => 'Sarjana',
                'foto' => null,
                'status_aktif_karyawan' => true,
                'tanggal_nonaktif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departments_id' => 1,
                'nama_karyawan' => 'Kani Wijayanti',
                'email' => 'kani@gmail.com',
                'nik_karyawan' => 'NIK006',
                'alamat' => 'Jl. Babakan Sirna Benteng',
                'no_hp' => '086789012345',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '1994-07-12',
                'status_pekerjaan' => 'Karyawan Kontrak',
                'pendidikan' => 'Diploma',
                'foto' => null,
                'status_aktif_karyawan' => true,
                'tanggal_nonaktif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departments_id' => 2,
                'nama_karyawan' => 'Antonius Wijaya',
                'email' => 'antonius@gmail.com',
                'nik_karyawan' => 'NIK007',
                'alamat' => 'Jl.Ujung Beruk Jakarta',
                'no_hp' => '087890123456',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Katolik',
                'status' => 'Aktif',
                'tempat_lahir' => 'Denpasar',
                'tanggal_lahir' => '1987-09-30',
                'status_pekerjaan' => 'Karyawan Kontrak',
                'pendidikan' => 'Sarjana',
                'foto' => null,
                'status_aktif_karyawan' => true,
                'tanggal_nonaktif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departments_id' => 3,
                'nama_karyawan' => 'Yulia Putri',
                'email' => 'yulia@gmail.com',
                'nik_karyawan' => 'NIK008',
                'alamat' => 'Jl. Cibolang Girang',
                'no_hp' => '088901234567',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Islam',
                'status' => 'Aktif',
                'tempat_lahir' => 'Balikpapan',
                'tanggal_lahir' => '1991-04-18',
                'status_pekerjaan' => 'Karyawan Kontrak',
                'pendidikan' => 'S2',
                'foto' => null,
                'status_aktif_karyawan' => true,
                'tanggal_nonaktif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departments_id' => 4,
                'nama_karyawan' => 'Indra Kusuma',
                'email' => 'indra@gmail.com',
                'nik_karyawan' => 'NIK009',
                'alamat' => 'Jl. Cibadak Gede',
                'no_hp' => '089012345678',
                'jenis_kelamin' => 'Laki-laki',
                'agama' => 'Hindu',
                'status' => 'Aktif',
                'tempat_lahir' => 'Makassar',
                'tanggal_lahir' => '1995-06-23',
                'status_pekerjaan' => 'Karyawan Kontrak',
                'pendidikan' => 'D3',
                'foto' => null,
                'status_aktif_karyawan' => true,
                'tanggal_nonaktif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departments_id' =>5,
                'nama_karyawan' => 'Maya Sari',
                'email' => 'maya.sari@gmail.com',
                'nik_karyawan' => 'NIK010',
                'alamat' => 'Jl.Gunungguruh',
                'no_hp' => '090123456789',
                'jenis_kelamin' => 'Perempuan',
                'agama' => 'Buddha',
                'status' => 'Aktif',
                'tempat_lahir' => 'Palembang',
                'tanggal_lahir' => '1989-12-07',
                'status_pekerjaan' => 'Karyawan Kontrak',
                'pendidikan' => 'Sarjana',
                'foto' => null,
                'status_aktif_karyawan' => true,
                'tanggal_nonaktif' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data karyawan lainnya sesuai kebutuhan
        ];

        DB::table('tr_karyawan')->insert($karyawanData);
    }

        // $faker = Faker::create('id_ID'); // Gunakan locale 'id_ID' untuk nama-nama Indonesia

        // for ($i = 1; $i <= 25; $i++) {
        //     $nikCounter = str_pad($i, 3, '0', STR_PAD_LEFT); // Membuat counter dengan panjang 3 digit, misal: 001, 002, ..., 025
        //     DB::table('tr_karyawan')->insert([
        //         'departments_id' => $faker->numberBetween(1, 5),
        //         'nama_karyawan'  => $faker->firstName . ' ' . $faker->lastName,
        //         'email' => $faker->email,
        //         'nik_karyawan'  => 'NIK' . $nikCounter,
        //         'alamat' => $faker->address,
        //         'no_hp' => $faker->unique()->numerify('##########'),
        //         'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
        //         'agama' => $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Buddha']),
        //         'status' => $faker->randomElement(['Menikah', 'Belum Menikah']),
        //         'tempat_lahir' => $faker->city,
        //         'tanggal_lahir' => $faker->date,
        //         'status_pekerjaan' => $faker->randomElement(['Kontrak', 'Tetap']),
        //         'pendidikan' => $faker->randomElement(['SMA', 'D3', 'S1']),
        //         'foto' => null,
        //         'status_aktif_karyawan' => true,
        //         'tanggal_nonaktif' => $faker->optional()->date,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }

