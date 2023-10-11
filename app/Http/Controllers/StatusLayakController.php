<?php

namespace App\Http\Controllers;

use App\Models\Penilaian_fuzzy;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class StatusLayakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penilaian_fuzzy::with('karyawan')
        ->where('status', 'Layak')
        // ->whereYear('tahun_input_reward', '=', 2021) // Filter berdasarkan tahun
        ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
        ->get();
    // dd($nilaiTidakLayak);

        return view('penilaian.layak', compact('data'));
    }

    public function exportPdf() {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Layak')
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();

        $pdf = PDF::loadView('penilaian.layak-pdf', compact('data'));

        return $pdf->download('Data Layak.pdf');
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
