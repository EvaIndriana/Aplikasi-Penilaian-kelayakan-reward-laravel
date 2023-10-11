<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Department;
use App\Models\Tr_Karyawan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call ([
            UserTableSeeder::class
        ]);
        $this->call ([
            DepartmentSeeder::class
        ]);
        $this->call ([
            Tr_KaryawanSeeder::class
        ]);
        $this->call ([
            Tr_Indikator_KomunikasiSeeder::class
        ]);
        $this->call ([
            Tr_Nilai_KomunikasiSeeder::class
        ]);
        $this->call ([
            Tr_Nilai_KinerjaSeeder::class
        ]);
        $this->call ([
            Tr_Indikator_KinerjaSeeder::class
        ]);
        $this->call ([
            Tr_Indikator_LoyalitasSeeder::class
        ]);
        $this->call ([
            Tr_Nilai_LoyalitasSeeder::class
        ]);
        $this->call ([
            PenilaianFuzzySeeder::class
        ]);
    }
    }

