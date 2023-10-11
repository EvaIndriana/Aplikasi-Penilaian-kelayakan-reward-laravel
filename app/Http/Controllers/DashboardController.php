<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;
use App\Models\Tr_Karyawan;
class DashboardController extends Controller
{
    public function index()
    {
        //perhitungan jumlah dan nama karyawan dari semua departemen
        $jumlahKaryawanPerDepartemen = Department::select('departments.name')
        ->selectRaw('count(tr_karyawan.id) as total')
        ->leftJoin('tr_karyawan', 'departments.id', '=', 'tr_karyawan.departments_id')
        ->groupBy('departments.id', 'departments.name')

        ->get();

        //menampilkan jumlah user
        $users = User::take(3)->get();
        return view('home', compact( 'jumlahKaryawanPerDepartemen', 'users'));
    }

    public function showdepartments()
    {
        //menampilkan jumlah karyawa perdepartemen
        $DepartemenHRD = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department HRD')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        $DepartmentEnvironment = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department Environment ')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        $DepartmentEngineering = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department Engineering ')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        $DepartmentAccounting = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department Accounting ')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        $DepartmentSafety= Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department Safety')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();


        return view('dashboard.showdep', compact('DepartemenHRD', 'DepartmentEnvironment','DepartmentEngineering','DepartmentAccounting','DepartmentSafety'));
    }

    public function cetakLaporanKaryawan(Request $request)
    {
        $departmentId = $request->input('departments_id');

        $karyawan = Tr_Karyawan::where('departments_id', $departmentId)->get();

        if ($karyawan->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data karyawan dalam departemen ini.');
        }

        $pdf = Pdf::loadView('dashboard.cetak-laporan', compact('karyawan'));

        return $pdf->download('laporan-karyawan-departemen-'.$departmentId.'.pdf');
    }
}
