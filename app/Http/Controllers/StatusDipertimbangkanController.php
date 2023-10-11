<?php

namespace App\Http\Controllers;

use App\Models\Penilaian_fuzzy;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class StatusDipertimbangkanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $data = Penilaian_fuzzy::with('karyawan')
    //     ->where('status', 'Dipertimbangkan')
    //     ->whereYear('tahun_input_reward', '=', 2021) // Filter berdasarkan tahun
    //     ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
    //     ->get();
    // // dd($nilaiTidakLayak);

    //     return view('penilaian.dipertimbangkan', compact('data'));
    // }

    public function exportPdf() {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Dipertimbangkan')
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();

        $pdf = PDF::loadView('penilaian.dipertimbangkan-pdf', compact('data'));

        return $pdf->download('Data Dipertimbangkan.pdf');
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
