<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tr_Indikator_Loyalitas;
class Tr_Indikator_LoyalitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indikator_loyalitas = Tr_Indikator_Loyalitas::all();
        return view('indikator-loyalitas.index',['indikator_loyalitas' => $indikator_loyalitas]);
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
        $indikator_loyalitas = Tr_Indikator_Loyalitas::findOrFail($id);
        return view('indikator-loyalitas.edit', compact('indikator_loyalitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $indikator_loyalitas = Tr_Indikator_Loyalitas::findOrFail($id);

        // Validasi input
        $request->validate([
            'indikator_loyalitas_1' => 'required|max:255',
            'indikator_loyalitas_2' => 'required|max:255',
            'indikator_loyalitas_3' => 'required|max:255',
        ]);

        // Memperbarui data departemen
        $indikator_loyalitas->update([
            'indikator_loyalitas_1' => $request->input('indikator_loyalitas_1'),
            'indikator_loyalitas_2' => $request->input('indikator_loyalitas_2'),
            'indikator_loyalitas_3' => $request->input('indikator_loyalitas_3')
        ]);

        $request->session()->flash('success', 'Data indikator loyalitasberhasil diupdate');
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
