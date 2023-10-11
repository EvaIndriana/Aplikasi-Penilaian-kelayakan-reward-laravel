<?php

namespace App\Http\Controllers;

use App\Models\Tr_Indikator_Komunikasi;
use App\Models\Tr_Indikator_Loyalitas;
use Illuminate\Http\Request;
use App\Models\Tr_Indikator_Kinerja;

class Tr_Indikator_KinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indikator_kinerja = Tr_Indikator_Kinerja::all();
        $indikator_komunikasi = Tr_Indikator_Komunikasi::all();
        $indikator_loyalitas = Tr_Indikator_Loyalitas::all();
        return view('indikator-kinerja.index',compact('indikator_komunikasi','indikator_kinerja','indikator_loyalitas'));
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
        $indikator_kinerja = Tr_Indikator_Kinerja::findOrFail($id);
        return view('indikator-kinerja.edit', compact('indikator_kinerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $indikator_kinerja = Tr_Indikator_Kinerja::findOrFail($id);

    // Validasi input
    $request->validate([
        'indikator_kinerja_1' => 'required|max:255',
        'indikator_kinerja_2' => 'required|max:255',
        'indikator_kinerja_3' => 'required|max:255',
    ]);

    // Memperbarui data departemen
    $indikator_kinerja->update([
        'indikator_kinerja_1' => $request->input('indikator_kinerja_1'),
        'indikator_kinerja_2' => $request->input('indikator_kinerja_2'),
        'indikator_kinerja_3' => $request->input('indikator_kinerja_3')
    ]);

    $request->session()->flash('success', 'Data indikator kinerja berhasil diupdate');
    return redirect('/indikator_kinerja');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
