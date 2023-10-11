<?php

namespace App\Http\Controllers;

use App\Models\Tr_Indikator_Kinerja;
use App\Models\Tr_Indikator_Komunikasi;
use Illuminate\Http\Request;

class Tr_Indikator_KomunikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $indikator_komunikasi = Tr_Indikator_Komunikasi::all();
        return view('indikator-komunikasi.index',['indikator_komunikasi' => $indikator_komunikasi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('indikator-komunikasi.create');
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

        $indikator_komunikasi = Tr_Indikator_Komunikasi::findOrFail($id);
        return view('indikator-komunikasi.edit', compact('indikator_komunikasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $indikator_komunikasi = Tr_Indikator_Komunikasi::findOrFail($id);

        // Validasi input
        $request->validate([
            'indikator_komunikasi_1' => 'required|max:255',
            'indikator_komunikasi_2' => 'required|max:255',
            'indikator_komunikasi_3' => 'required|max:255',
        ]);

        // Memperbarui data departemen
        $indikator_komunikasi->update([
            'indikator_komunikasi_1' => $request->input('indikator_komunikasi_1'),
            'indikator_komunikasi_2' => $request->input('indikator_komunikasi_2'),
            'indikator_komunikasi_3' => $request->input('indikator_komunikasi_3')
        ]);

        $request->session()->flash('success', 'Data indikator komunikasiberhasil diupdate');
        return redirect('/indikator_kinerja');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $indikator_komunikasi = Tr_Indikator_Komunikasi::findOrFail($id);
        $indikator_komunikasi->delete();
        return redirect()->back();
    }
}
