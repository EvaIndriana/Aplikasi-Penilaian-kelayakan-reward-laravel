<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Tr_Karyawan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KaryawanExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class Tr_KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $karyawanAktif = Tr_Karyawan::where('status_aktif_karyawan', true)->get();
        // $karyawan = Tr_Karyawan::all();
        $karyawan = Tr_Karyawan::whereHas('departments')->get();

        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('karyawan.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_karyawan' => 'required|string|max:255',
            'nik_karyawan' => ['required', 'string', 'max:255', Rule::unique('tr_karyawan', 'nik_karyawan')],
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email',
            'tempat_lahir' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'jenis_kelamin' => 'required|string|max:20',
            'agama' => 'required|string|max:20',
            'status' => 'required|string|max:20',
            'status_pekerjaan' => 'required|string|max:20',
            'pendidikan' => 'required|string|max:20',
            'status_aktif_karyawan' => 'required|boolean',
            // 'foto'                  => 'required|mimes:png,jpg,jpeg|max:2048',
            // 'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Jika Anda ingin mengunggah foto
        ]);

        //menambahkan image
        //   $foto_file = $request->file('foto');
        //   $foto_ekstensi = $foto_file->extension();
        //   $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        //   $foto_file->move(public_path('foto-karyawan'), $foto_nama);


        // Simpan data ke tabel users
        $data = [
            'departments_id' => $request->input('departments_id'),
            'nama_karyawan' => $request->input('nama_karyawan'),
            'nik_karyawan' => $request->input('nik_karyawan'),
            'alamat' => $request->input('alamat'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'email' => $request->input('email'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'no_hp' => $request->input('no_hp'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'status' => $request->input('status'),
            'status_pekerjaan' => $request->input('status_pekerjaan'),
            'pendidikan' => $request->input('pendidikan'),
            'status_aktif_karyawan' => $request->input('status_aktif_karyawan')
            // 'foto'          => $foto_nama,
        ];
        // Simpan data ke dalam tabel "tr_karyawan"
        Tr_Karyawan::create($data);
        $request->session()->flash('success', 'Data Karyawan berhasil dibuat');
        return redirect('/karyawan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $karyawan = Tr_Karyawan::findOrFail($id);
        $departments = $karyawan->departments;
        return view('karyawan.show', compact('karyawan','departments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $departments = Department::all();
        $karyawan = Tr_Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $karyawan = Tr_Karyawan::findOrFail($id);

    // Validasi input
    $request->validate([
        'nama_karyawan' => 'required|string|max:255',
        'nik_karyawan' => 'required|string|max:255',
        'alamat' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'email' => 'required|email',
        'tempat_lahir' => 'required|string',
        'no_hp' => 'required|string|max:15',
        'jenis_kelamin' => 'required|string|max:20',
        'agama' => 'required|string|max:20',
        'status' => 'required|string|max:20',
        'status_pekerjaan' => 'required|string|max:20',
        'pendidikan' => 'required|string|max:20',
        'status_aktif_karyawan' => 'required|boolean',
    ]);

    // Cek apakah nik_karyawan baru sama dengan yang lama atau unik
    if ($request->input('nik_karyawan') === $karyawan->nik_karyawan || Tr_Karyawan::where('nik_karyawan', $request->input('nik_karyawan'))->where('id', '!=', $id)->count() === 0) {
        // Cek status keaktifan karyawan
        $statusAktifBaru = $request->input('status_aktif_karyawan');

        // Jika status diubah menjadi non-aktif
        if ($statusAktifBaru == 0) {
            $request->validate([
                'tanggal_nonaktif' => 'required|date', // Validasi tanggal_nonaktif
            ]);
            $karyawan->tanggal_nonaktif = $request->input('tanggal_nonaktif');
        } else {
            // Jika status tetap aktif, atur tanggal_nonaktif menjadi null
            $karyawan->tanggal_nonaktif = null;
        }

        // Memperbarui data karyawan
        $karyawan->update([
            'nama_karyawan' => $request->input('nama_karyawan'),
            'nik_karyawan' => $request->input('nik_karyawan'),
            'alamat' => $request->input('alamat'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'email' => $request->input('email'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'no_hp' => $request->input('no_hp'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'status' => $request->input('status'),
            'status_pekerjaan' => $request->input('status_pekerjaan'),
            'pendidikan' => $request->input('pendidikan'),
            'status_aktif_karyawan' => $request->input('status_aktif_karyawan')
        ]);

        $request->session()->flash('success', 'Data karyawan berhasil diupdate');
    } else {
        $request->session()->flash('error', 'NIK Karyawan sudah digunakan.');
    }

    return redirect('/karyawan');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karyawan = Tr_Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->back();
    }

    //PDF semua karyawan
    public function cetak_pdf_karyawan()
    {
        $karyawan = Tr_Karyawan::all();
        $pdf = Pdf::loadView('karyawan.cetak-pdf', ['karyawan' => $karyawan]);
        return $pdf->download('laporan_karyawan.pdf');
        // return view('karyawan.cetak-pdf', compact('karyawan'));
    }

    //Download PDF karyawan (sesuai id)
    public function downloadPDF($id)
    {
        $karyawan = Tr_Karyawan::findOrFail($id);

        if (!$karyawan) {
            return redirect()->back()->with('error', 'Karyawan tidak ditemukan.');
        }

        $pdf = PDF::loadView('karyawan.detail-karyawan-pdf', compact('karyawan'));
        return $pdf->download('detail-karyawan.pdf');
    }



    // public function indexAktif()
    // {
    //     $karyawanAktif = Tr_Karyawan::where('status_aktif_karyawan', true)->get();
    //     dd($karyawanAktif);
    //     return view('karyawan.index-nonaktif', compact('karyawanAktif'));
    // }

    // public function indexNonAktif()
    // {
    //     $karyawannonAktif = Tr_Karyawan::where('status_aktif_karyawan', false)->get();
    //     dd($karyawannonAktif);
    //     return view('karyawan.index-nonaktif', compact('karyawannonAktif'));
    // }



}
