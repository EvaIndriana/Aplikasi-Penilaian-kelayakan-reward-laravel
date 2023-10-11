<?php

namespace App\Http\Controllers;

use App\Models\Penilaian_fuzzy;
use App\Models\Tr_Karyawan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KaryawanTidakAktifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Mengambil jumlah status dari tabel penilaian_fuzzy
    $jumlahStatusLayak = Penilaian_fuzzy::where('status', '=', 'Layak')->count();
    $jumlahStatusTidakLayak = Penilaian_fuzzy::where('status', '=', 'Tidak Layak')->count();
    $jumlahStatusDipertimbangkan = Penilaian_fuzzy::where('status', '=', 'Dipertimbangkan')->count();
    $karyawanTidakAktif = Tr_Karyawan::where('status_aktif_karyawan',false)->get();
    return view('karyawan.index-nonaktif', compact('karyawanTidakAktif'));
    }

    public function karyawanTidakAktif()
    {
        $karyawan = Tr_Karyawan::where('status_aktif_karyawan', false)->get();
        $pdf = Pdf::loadView('laporan.cetak-karyawan-non-aktif', ['karyawan' => $karyawan]);
        return $pdf->download('karyawan non-aktif.pdf');
        // return view('karyawan.cetak-pdf', compact('karyawan'));
    }
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
