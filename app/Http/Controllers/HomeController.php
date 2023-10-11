<?php

namespace App\Http\Controllers;

use App\Models\Penilaian_fuzzy;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //perhitungan jumlah dan nama karyawan dari semua departemen
        $jumlahKaryawanPerDepartemen = Department::select('departments.name')
        ->selectRaw('count(tr_karyawan.id) as total')
        ->selectRaw('sum(case when tr_karyawan.status_aktif_karyawan = 1 then 1 else 0 end) as active_count')
        ->leftJoin('tr_karyawan', 'departments.id', '=', 'tr_karyawan.departments_id')
        ->groupBy('departments.id', 'departments.name')
        ->get();

        //menampilkan jumlah user
        $users = User::take(8)->get();

       // Mengambil jumlah status dari tabel penilaian_fuzzy
    $jumlahStatusLayak = Penilaian_fuzzy::where('status', '=', 'Layak')->count();
    $jumlahStatusTidakLayak = Penilaian_fuzzy::where('status', '=', 'Tidak Layak')->count();
    $jumlahStatusDipertimbangkan = Penilaian_fuzzy::where('status', '=', 'Dipertimbangkan')->count();

    // Mengirimkan data ke tampilan home.blade.php
    return view('home', compact('jumlahKaryawanPerDepartemen', 'users', 'jumlahStatusLayak', 'jumlahStatusTidakLayak', 'jumlahStatusDipertimbangkan'));
    }
}
