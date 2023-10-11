<?php

namespace App\Http\Controllers;

use App\Models\Penilaian_fuzzy;
use App\Models\Tr_Karyawan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawanAktif = Tr_Karyawan::where('status_aktif_karyawan', true)->get();
        $karyawantidakAktif = Tr_Karyawan::where('status_aktif_karyawan', false)->get();

        //menampilkan karyawan per departments
        $DepartemenHRD = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department HRD')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan', 'tr_karyawan.email') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        $DepartmentEnvironment = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department Environment ')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan','tr_karyawan.email') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        $DepartmentEngineering = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department Engineering ')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan','tr_karyawan.email') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        $DepartmentAccounting = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department Accounting ')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan','tr_karyawan.email') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

        $DepartmentSafety= Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('departments.name', '=', 'Department Safety')
            ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan','tr_karyawan.email') // Menambahkan 'nik_karyawan' ke dalam select
            ->get();

             // Mengambil jumlah status dari tabel penilaian_fuzzy
    $jumlahStatusLayak = Penilaian_fuzzy::where('status', '=', 'Layak')->count();
    $jumlahStatusTidakLayak = Penilaian_fuzzy::where('status', '=', 'Tidak Layak')->count();
    $jumlahStatusDipertimbangkan = Penilaian_fuzzy::where('status', '=', 'Dipertimbangkan')->count();
          // Ambil data karyawan dan relasinya dengan penilaian_fuzzy
        //   $data = Tr_Karyawan::with('penilaianFuzzy')->get();

        return view('laporan.all-laporan',compact('jumlahStatusLayak', 'jumlahStatusTidakLayak', 'jumlahStatusDipertimbangkan','karyawanAktif','karyawantidakAktif','DepartemenHRD', 'DepartmentEnvironment','DepartmentEngineering','DepartmentAccounting','DepartmentSafety'));
    }






    // public function karyawanTidakAktif()
    // {
    //     $karyawan = Tr_Karyawan::all();
    //     $pdf = Pdf::loadView('laporan.cetak-karyawan-aktif', ['karyawan' => $karyawan]);
    //     return $pdf->download('karyawan aktif.pdf');
    //     // return view('karyawan.cetak-pdf', compact('karyawan'));
    // }


    // public function showdepartments()
    // {
    //     //menampilkan jumlah karyawa perdepartemen
    //     $DepartemenHRD = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
    //         ->where('departments.name', '=', 'Department HRD')
    //         ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan') // Menambahkan 'nik_karyawan' ke dalam select
    //         ->get();

    //     $DepartmentEnvironment = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
    //         ->where('departments.name', '=', 'Department Environment ')
    //         ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan') // Menambahkan 'nik_karyawan' ke dalam select
    //         ->get();

    //     $DepartmentEngineering = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
    //         ->where('departments.name', '=', 'Department Engineering ')
    //         ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan') // Menambahkan 'nik_karyawan' ke dalam select
    //         ->get();

    //     $DepartmentAccounting = Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
    //         ->where('departments.name', '=', 'Department Accounting ')
    //         ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan') // Menambahkan 'nik_karyawan' ke dalam select
    //         ->get();

    //     $DepartmentSafety= Tr_Karyawan::join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
    //         ->where('departments.name', '=', 'Department Safety')
    //         ->select('tr_karyawan.nama_karyawan', 'tr_karyawan.nik_karyawan') // Menambahkan 'nik_karyawan' ke dalam select
    //         ->get();


    //     return view('dashboard.showdep', compact('DepartemenHRD', 'DepartmentEnvironment','DepartmentEngineering','DepartmentAccounting','DepartmentSafety'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
