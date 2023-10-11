<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use Illuminate\Support\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(['name' => 'Department HRD ']);
        Department::create(['name' => 'Department Environment']);
        Department::create(['name' => 'Department Engineering']);
        Department::create(['name' => 'Department Accounting ']);
        Department::create(['name' => 'Department Safety']);
    }
}
