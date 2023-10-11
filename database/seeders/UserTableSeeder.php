<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'          => 'Eva Indriana',
                'email'         => 'eva@gmail.com',
                'password'      => Hash::make('1234567890'),
                'role'          => 'Admin Aplikasi',
                'no_hp'         => '088211702366',
                'tempat_lahir'  => 'Sukabumi',
                'tanggal_lahir' => '1994-04-13',
                'agama'         => 'Islam',
                'status'        => 'Lajang',
                'foto'          => 'icon-cw-1.jpg',
                'alamat'        => 'Kp. Padaraang Rt 003/013, Kec.Gunungguruh, Kab.Sukabumi, Provinsi.Jawa Barat 43156'
            ],
            [
                'name'          => 'Siti Sania',
                'email'         => 'sania@gmail.com',
                'password'      => Hash::make('1234567890'),
                'role'          => 'Admin Hrd',
                'no_hp'         => '088211702366',
                'tempat_lahir'  => 'Sukabumi',
                'tanggal_lahir' => '1994-04-13',
                'agama'         => 'Islam',
                'status'        => 'Lajang',
                'foto'          => 'icon-cw-2.jpg',
                'alamat'        => 'Kp. Padaraang Rt 003/013, Kec.Gunungguruh, Kab.Sukabumi, Provinsi.Jawa Barat 43156'
            ],
            [
                'name'          => 'Ruly Hardiansyah',
                'email'         => 'ruly@gmail.com',
                'password'      => Hash::make('1234567890'),
                'role'          => 'Pimpinan',
                'no_hp'         => '088211702366',
                'tempat_lahir'  => 'Sukabumi',
                'tanggal_lahir' => '1994-04-13',
                'agama'         => 'Islam',
                'status'        => 'Lajang',
                'foto'          => 'icon-co-1.jpg',
                'alamat'        => 'Kp. Padaraang Rt 003/013, Kec.Gunungguruh, Kab.Sukabumi, Provinsi.Jawa Barat 43156'
            ],
            [

                    'name'          => 'Evi Indriana',
                    'email'         => 'evi@gmail.com',
                    'password'      => Hash::make('1234567890'),
                    'role'          => 'Kepala Dep.Hrd',
                    'no_hp'         => '088211702366',
                    'tempat_lahir'  => 'Sukabumi',
                    'tanggal_lahir' => '1994-04-13',
                    'agama'         => 'Islam',
                    'status'        => 'Lajang',
                    'foto'          =>'icon-cw-3.jpg',
                    'alamat'        => 'Kp. Padaraang Rt 003/013, Kec.Gunungguruh, Kab.Sukabumi, Provinsi.Jawa Barat 43156'
            ],
            [

                'name'          => 'Zakia Sakinah',
                'email'         => 'zakia@gmail.com',
                'password'      => Hash::make('1234567890'),
                'role'          => 'Kepala Dep.Environment',
                'no_hp'         => '088211702366',
                'tempat_lahir'  => 'Sukabumi',
                'tanggal_lahir' => '1994-04-13',
                'agama'         => 'Islam',
                'status'        => 'Lajang',
                'foto'          => 'icon-cw-4.jpg',
                'alamat'        => 'Kp. Padaraang Rt 003/013, Kec.Gunungguruh, Kab.Sukabumi, Provinsi.Jawa Barat 43156'
            ],
            [

                'name'          => 'Asep Faturahman',
                'email'         => 'asep@gmail.com',
                'password'      => Hash::make('1234567890'),
                'role'          => 'Kepala Dep.Engineering',
                'no_hp'         => '088211702366',
                'tempat_lahir'  => 'Sukabumi',
                'tanggal_lahir' => '1994-04-13',
                'agama'         => 'Islam',
                'status'        => 'Lajang',
                'foto'          => 'icon-co-2.jpg',
                'alamat'        => 'Kp. Padaraang Rt 003/013, Kec.Gunungguruh, Kab.Sukabumi, Provinsi.Jawa Barat 43156'
            ],
            [

                'name'          => 'Budiana Rohman',
                'email'         => 'budi@gmail.com',
                'password'      => Hash::make('1234567890'),
                'role'          => 'Kepala Dep.Accounting',
                'no_hp'         => '088211702366',
                'tempat_lahir'  => 'Sukabumi',
                'tanggal_lahir' => '1994-04-13',
                'agama'         => 'Islam',
                'status'        => 'Lajang',
                'foto'          => 'icon-co-3.jpg',
                'alamat'        => 'Kp. Padaraang Rt 003/013, Kec.Gunungguruh, Kab.Sukabumi, Provinsi.Jawa Barat 43156'
            ],
            [

                'name'          => 'Aisyah Gumela',
                'email'         => 'aisyah@gmail.com',
                'password'      => Hash::make('1234567890'),
                'role'          => 'Kepala Dep.Safety',
                'no_hp'         => '088211702366',
                'tempat_lahir'  => 'Sukabumi',
                'tanggal_lahir' => '1994-04-13',
                'agama'         => 'Islam',
                'status'        => 'Lajang',
                'foto'          => 'icon-cw-5.jpg',
                'alamat'        => 'Kp. Padaraang Rt 003/013, Kec.Gunungguruh, Kab.Sukabumi, Provinsi.Jawa Barat 43156'
            ],
        ];

        // foreach ($users as &$user) {
        //     $user['foto'] = 'foto/default.png'; // Sesuaikan dengan path gambar Anda di direktori public/storage
        // }

        User::insert($users);

    }
}
