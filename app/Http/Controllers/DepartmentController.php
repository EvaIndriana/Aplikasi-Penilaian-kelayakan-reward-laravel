<?php

namespace App\Http\Controllers;

use App\Models\Tr_Karyawan;
use Illuminate\Http\Request;
use App\Models\Department;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function showDep()
    {
        //menampilkan karyawan per departments
        $DepartemenHRD = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department HRD')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan', 'tr_karyawan.email') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        $DepartmentEnvironment = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department Environment ')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan', 'tr_karyawan.email') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        $DepartmentEngineering = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department Engineering ')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan', 'tr_karyawan.email') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        $DepartmentAccounting = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department Accounting ')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan', 'tr_karyawan.email') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        $DepartmentSafety = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department Safety')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan', 'tr_karyawan.email') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        return view('departments.all-departments', compact('DepartemenHRD', 'DepartmentEnvironment', 'DepartmentEngineering', 'DepartmentAccounting', 'DepartmentSafety'));
    }


    public function departments()
    {
        $departments = Department::all();
        $pdf = Pdf::loadView('departments.cetak-departments', ['departments' => $departments]);
        return $pdf->download('Data Departments.pdf');
        // return view('karyawan.cetak-pdf', compact('departments'));
    }
    public function cetak_hrd()
    {
        $departmentName = 'Department HRD'; // Ganti dengan nama departemen yang ingin Anda cetak
        $departments = Department::where('name', $departmentName)->first();
        if (!$departments) {
            return 'Departemen tidak ditemukan';
        }
        $karyawan = $departments->karyawan;
        // Membuat PDF
        $pdf = PDF::loadView('departments.cetak-hrd', ['karyawan' => $karyawan]);

        // Menghasilkan dan mengunduh PDF
        return $pdf->download('Karyawan-Dep.Hrd.pdf');
    }

    public function cetak_environment()
    {
        $departmentName = 'Department Environment'; // Ganti dengan nama departemen yang ingin Anda cetak
        $departments = Department::where('name', $departmentName)->first();
        if (!$departments) {
            return 'Departemen tidak ditemukan';
        }
        $karyawan = $departments->karyawan;
        // Membuat PDF
        $pdf = PDF::loadView('departments.cetak-environments', ['karyawan' => $karyawan]);

        // Menghasilkan dan mengunduh PDF
        return $pdf->download('Karyawan-Dep.Environment.pdf');
    }

    public function cetak_engineering()
    {
        $departmentName = 'Department Engineering'; // Ganti dengan nama departemen yang ingin Anda cetak
        $departments = Department::where('name', $departmentName)->first();
        if (!$departments) {
            return 'Departemen tidak ditemukan';
        }
        $karyawan = $departments->karyawan;
        // Membuat PDF
        $pdf = PDF::loadView('departments.cetak-environments', ['karyawan' => $karyawan]);

        // Menghasilkan dan mengunduh PDF
        return $pdf->download('Karyawan-Dep.Engineering.pdf');
    }

    public function cetak_accounting()
    {
        $departmentName = 'Department Accounting '; // Ganti dengan nama departemen yang ingin Anda cetak
        $departments = Department::where('name', $departmentName)->first();
        if (!$departments) {
            return 'Departemen tidak ditemukan';
        }
        $karyawan = $departments->karyawan;
        // Membuat PDF
        $pdf = PDF::loadView('departments.cetak-accounting', ['karyawan' => $karyawan]);

        // Menghasilkan dan mengunduh PDF
        return $pdf->download('Karyawan-Dep.Accounting.pdf');
    }

    public function cetak_safety()
    {
        $departmentName = 'Department Safety '; // Ganti dengan nama departemen yang ingin Anda cetak
        $departments = Department::where('name', $departmentName)->first();
        if (!$departments) {
            return 'Departemen tidak ditemukan';
        }
        $karyawan = $departments->karyawan;
        // Membuat PDF
        $pdf = PDF::loadView('departments.cetak-safety', ['karyawan' => $karyawan]);

        // Menghasilkan dan mengunduh PDF
        return $pdf->download('Karyawan-Dep.Safety.pdf');
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate(
            [
                'name' => 'required|max:255',
            ],
            [
                'name.required' => 'Form tidak boleh kosong'
            ]
        );

        // Simpan data ke tabel Departmnes
        Department::create([
            'name' => $request->input('name')
        ]);

        $request->session()->flash('success', 'Data Departments berhasil dibuat');
        return redirect('/departments');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departments = Department::findOrFail($id);
        return view('departments.edit', compact('departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $departments = Department::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|max:255',
        ]);

        // Memperbarui data departemen
        $departments->update([
            'name' => $request->input('name')
        ]);

        $request->session()->flash('success', 'Data Departments berhasil diupdate');
        return redirect('/departments');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departments = Department::findOrFail($id);
        $departments->delete();
        return redirect()->back();
    }
}
