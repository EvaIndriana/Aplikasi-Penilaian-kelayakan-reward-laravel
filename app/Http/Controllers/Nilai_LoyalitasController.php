<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Tr_Karyawan;
use App\Models\Tr_Indikator_Loyalitas;
use App\Models\Tr_Nilai_Loyalitas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
class Nilai_LoyalitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $indikator_loyalitas = Tr_Indikator_Loyalitas::all();
    //     $departments = Department::all();
    //     $karyawan = Tr_Karyawan::all();
    //     $nilai_loyalitas = Tr_Nilai_loyalitas::all();
    //     return view('nilai-loyalitas.index', compact('nilai_loyalitas', 'karyawan', 'departments','indikator_loyalitas'));
    // }

    public function index()
    {
        $user = Auth::user();
        $userRole = $user->role;

        if ($userRole === 'Kepala Dep.Accounting') {
            // Jika pengguna memiliki peran "Kepala Dep.Accounting"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "Accounting"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department Accounting');
            })->get();

            // Anda juga dapat mengambil data nilai kinerja jika diperlukan
            $nilai_loyalitas = Tr_Nilai_Loyalitas::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        } elseif ($userRole === 'Kepala Dep.Hrd') {
            // Jika pengguna memiliki peran "Admin Hrd" atau "Kepala Dep.Hrd"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "HRD"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department HRD');
            })->get();

            // Anda juga dapat mengambil data nilai loyalitas jika diperlukan
            $nilai_loyalitas = Tr_Nilai_Loyalitas::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        }elseif ($userRole === 'Kepala Dep.Engineering') {
            // Jika pengguna memiliki peran "Admin Hrd" atau "Kepala Dep.Hrd"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "HRD"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department Engineering');
            })->get();

            // Anda juga dapat mengambil data nilai loyalitas jika diperlukan
            $nilai_loyalitas = Tr_Nilai_Loyalitas::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        }elseif ($userRole === 'Kepala Dep.Safety') {
            // Jika pengguna memiliki peran "Admin Hrd" atau "Kepala Dep.Hrd"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "HRD"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department Safety');
            })->get();

            // Anda juga dapat mengambil data nilai loyalitas jika diperlukan
            $nilai_loyalitas = Tr_Nilai_Loyalitas::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        }elseif ($userRole === 'Kepala Dep.Environment') {
        // Jika pengguna memiliki peran "Admin Hrd" atau "Kepala Dep.Hrd"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "HRD"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department Environment');
            })->get();

            // Anda juga dapat mengambil data nilai loyalitas jika diperlukan
            $nilai_loyalitas = Tr_Nilai_Loyalitas::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        }
        else {
            // Pengguna dengan peran lain dapat melihat semua data
            $karyawan = Tr_Karyawan::all();

            // Anda juga dapat mengambil data nilai loyalitas jika diperlukan
            $nilai_loyalitas = Tr_Nilai_Loyalitas::all();
        }

        // Ambil data lain yang dibutuhkan, seperti indikator loyalitas, departemen, dan lainnya
        $indikator_loyalitas = Tr_Indikator_Loyalitas::all();
        $departments = Department::all();

        return view('nilai-loyalitas.index', compact('nilai_loyalitas', 'karyawan', 'departments', 'indikator_loyalitas'));
    }




private function getDepartmentNameByRole($role)
{
    // Buat pemetaan antara peran (role) dengan nama departemen yang sesuai
    $roleToDepartment = [
        'Admin Hrd' => 'Department HRD',
        'Kepala Dep.Hrd' => 'Department HRD',
        'Kepala Dep.Environment' => 'Department Environment',
        'Kepala Dep.Engineering' => 'Department Engineering',
        'Kepala Dep.Accounting' => 'Department Accounting',
        'Kepala Dep.Safety' => 'Department Safety',
    ];

    // Kembalikan nama departemen berdasarkan peran (role) pengguna
    return $roleToDepartment[$role] ?? null;
}

    public function getData($id)
    {
        try {
            $karyawan = DB::table('tr_karyawan')
                ->where('tr_karyawan.id', $id)
                ->select(
                    'tr_karyawan.*'
                )
                ->first();

            if (!$karyawan) {
                return response()->json(['error' => 'Karyawan tidak ditemukan'], 404);
            }
            return response()->json($karyawan);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat mengambil data'], 500);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawanBelumDinilai = Tr_Karyawan::where('status_aktif_karyawan', true)
        ->whereNotIn('id', function ($query) {
            $query->select('karyawan_id')->from('nilai_loyalitas');
        })
        ->get();

    $departments = Department::all();
    $indikator_loyalitas = Tr_Indikator_Loyalitas::first();

        // return view('nama_view', compact('karyawanBelumDipilih'));
        return view('nilai-loyalitas.create', compact('departments', 'indikator_loyalitas','karyawanBelumDinilai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nilai_1' => 'required|numeric',
        'nilai_2' => 'required|numeric',
        'nilai_3' => 'required|numeric',
        'karyawan_id' => 'required',
    ]);

    // Ambil data karyawan berdasarkan ID
    $karyawan = Tr_Karyawan::find($request->input('karyawan_id'));

    // Periksa apakah karyawan nonaktif
    if (!$karyawan || !$karyawan->status_aktif_karyawan) {
        return redirect()->back()->with('error', 'Karyawan nonaktif tidak bisa mendapatkan penilaian');
    }

    $nilai_1 = $request->input('nilai_1');
    $nilai_2 = $request->input('nilai_2');
    $nilai_3 = $request->input('nilai_3');

    // Menghitung total nilai
    $totalNilaiLoyalitas = ($nilai_1 + $nilai_2 + $nilai_3) / 3;
    $totalNilaiLoyalitas = number_format($totalNilaiLoyalitas, 0);

    // Ambil departments_id dari data karyawan
    $departments_id = $karyawan->departments_id;

    // Simpan data ke dalam database dengan status "pending"
    $nilailoyalitas = new Tr_Nilai_Loyalitas;
    $nilailoyalitas->karyawan_id = $request->input('karyawan_id');
    $nilailoyalitas->tgl_input = Carbon::now();
    $nilailoyalitas->nilai_1 = $nilai_1;
    $nilailoyalitas->nilai_2 = $nilai_2;
    $nilailoyalitas->nilai_3 = $nilai_3;
    $nilailoyalitas->departments_id = $departments_id;
    $nilailoyalitas->total_nilai_loyalitas = $totalNilaiLoyalitas;
    $nilailoyalitas->status_data_loyalitas = 'pending'; // Set status ke "pending"
    $nilailoyalitas->save();

    return redirect('/nilai_loyalitas')->with('success', 'Penilaian Indikator karyawan berhasil disimpan');
}

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        // Mengambil data nilai loyalitas berdasarkan ID
        $nilai_loyalitas = Tr_Nilai_Loyalitas::findOrFail($id);

        // Mengambil data karyawan yang terkait dengan nilai loyalitas
        $karyawan = $nilai_loyalitas->karyawan;

        // Mengambil data indikator variabel terkait dengan nilai loyalitas
        //  $indikator_loyalitas = $nilai_loyalitas->indikatorloyalitas;

        return view('nilai-loyalitas.show', compact('nilai_loyalitas', 'karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $nilai_loyalitas = Tr_Nilai_Loyalitas::with('karyawan')->findOrFail($id);
    $nama_karyawan = $nilai_loyalitas->karyawan->nama_karyawan;

    return view('nilai-loyalitas.edit', compact('nilai_loyalitas', 'nama_karyawan'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nilai_1' => 'required|numeric',
        'nilai_2' => 'required|numeric',
        'nilai_3' => 'required|numeric',
    ]);

    $nilai_loyalitas = Tr_Nilai_Loyalitas::findOrFail($id);

    // Lakukan pengecekan jika diperlukan, misalnya pengecekan karyawan nonaktif.

    $nilai_loyalitas->update([
        'nilai_1' => $request->input('nilai_1'),
        'nilai_2' => $request->input('nilai_2'),
        'nilai_3' => $request->input('nilai_3'),
        'total_nilai_loyalitas' => ($request->input('nilai_1') + $request->input('nilai_2') + $request->input('nilai_3')) / 3,
    ]);

    // Cek apakah pengguna yang melakukan pembaruan adalah admin HRD atau peran lain yang sesuai.
    if (in_array(Auth::user()->role, [
        'Admin Hrd',
        'Kepala Dep.Hrd',
        'Kepala Dep.Environment',
        'Kepala Dep.Engineering',
        'Kepala Dep.Accounting',
        'Kepala Dep.Safety',
    ])) {
        // Jika iya, atur status menjadi "pending"
        $nilai_loyalitas->update([
            'status_data_loyalitas' => 'pending',
        ]);
    }

    return redirect()->route('nilai_loyalitas.index')->with('success', 'Data penilaian karyawan berhasil diperbarui');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nilai_loyalitas = Tr_Nilai_Loyalitas::findOrFail($id);
        $nilai_loyalitas->delete();
        return redirect()->back();
    }


    public function approve($id)
    {
        try {
            // Temukan data nilai loyalitas berdasarkan ID
            $nilaiLoyalitas = Tr_Nilai_Loyalitas::findOrFail($id);

            // Set status menjadi 'approved'
            $nilaiLoyalitas->status_data_loyalitas = 'approved';

            // Simpan perubahan
            $nilaiLoyalitas->save();

            // Redirect kembali ke view "show" dengan pesan sukses
            return redirect()->route('nilai_loyalitas.show', ['id' => $nilaiLoyalitas->id])->with('success', 'Status telah diubah menjadi approved');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function revisi($id)
{
    try {
        // Temukan data nilai kinerja berdasarkan ID
        $nilaiLoyalitas = Tr_Nilai_Loyalitas::findOrFail($id);

        // Set status menjadi 'Revisi'
        $nilaiLoyalitas->status_data_loyalitas = 'Revisi';

        // Simpan catatan revisi (diambil dari input form atau dari parameter)
        $catatanRevisi = request()->input('catatan_revisi');
        $nilaiLoyalitas->catatan_revisi = $catatanRevisi;

        // Simpan perubahan
        $nilaiLoyalitas->save();

        // Redirect kembali ke view "index" dengan pesan sukses
        return redirect()->route('nilai_loyalitas.index')->with('success', 'Status telah diubah menjadi Revisi');
    } catch (\Exception $e) {
        // Tangani kesalahan jika terjadi
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

public function downloadPDF($id)
{
    $karyawan = Tr_Karyawan::find($id);

    if (!$karyawan) {
        return 'Karyawan tidak ditemukan';
    }

    // Ambil data nilai kinerja
    $nilaiLoyalitas = Tr_Nilai_Loyalitas::where('karyawan_id', $karyawan->id)->first();

    if (!$nilaiLoyalitas) {
        return 'Data nilai Loyalitas tidak ditemukan';
    }

    // Ambil data indikator Loyalitas (contoh, mengambil data indikator pertama)
    $indikatorLoyalitas = Tr_Indikator_Loyalitas::first();

    if (!$indikatorLoyalitas) {
        return 'Data indikator komunikasi tidak ditemukan';
    }

    // Membuat PDF dengan data dari tiga tabel
    $pdf = PDF::loadView('nilai-loyalitas.cetak-pdf', [
        'karyawan' => $karyawan,
        'nilai_loyalitas' => $nilaiLoyalitas,
        'indikator_loyalitas' => $indikatorLoyalitas,
    ]);

    // Menghasilkan dan mengunduh PDF
    return $pdf->download('Data_Komunikasi.pdf');
}

}
