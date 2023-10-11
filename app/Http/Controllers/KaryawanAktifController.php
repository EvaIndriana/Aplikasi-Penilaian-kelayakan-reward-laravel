<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tr_Karyawan;
use Barryvdh\DomPDF\Facade\Pdf;

class KaryawanAktifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawanAktif = Tr_Karyawan::where('status_aktif_karyawan', true)->get();
        return view('karyawan.index-aktif', compact('karyawanAktif'));
    }

    public function karyawanAktif()
    {
        $karyawan = Tr_Karyawan::where('status_aktif_karyawan', true)->get();
        $pdf = Pdf::loadView('laporan.cetak-karyawan-aktif', ['karyawan' => $karyawan]);
        return $pdf->download('karyawan aktif.pdf');
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
