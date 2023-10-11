<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Tr_Karyawan;
use App\Models\Tr_Indikator_Komunikasi;
use App\Models\Tr_Nilai_Komunikasi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class Nilai_KomunikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $indikator_komunikasi = Tr_Indikator_Komunikasi::all();
    //     $departments = Department::all();
    //     $karyawan = Tr_Karyawan::all();
    //     $nilai_komunikasi = Tr_Nilai_Komunikasi::all();
    //     return view('nilai-komunikasi.index', compact('nilai_komunikasi', 'karyawan', 'departments', 'indikator_komunikasi'));
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
            $nilai_komunikasi = Tr_Nilai_Komunikasi::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        } elseif ($userRole === 'Kepala Dep.Hrd') {
            // Jika pengguna memiliki peran "Admin Hrd" atau "Kepala Dep.Hrd"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "HRD"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department HRD');
            })->get();

            // Anda juga dapat mengambil data nilai komunikasi jika diperlukan
            $nilai_komunikasi = Tr_Nilai_Komunikasi::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        }elseif ($userRole === 'Kepala Dep.Engineering') {
            // Jika pengguna memiliki peran "Admin Hrd" atau "Kepala Dep.Hrd"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "HRD"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department Engineering');
            })->get();

            // Anda juga dapat mengambil data nilai komunikasi jika diperlukan
            $nilai_komunikasi = Tr_Nilai_Komunikasi::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        }elseif ($userRole === 'Kepala Dep.Safety') {
            // Jika pengguna memiliki peran "Admin Hrd" atau "Kepala Dep.Hrd"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "HRD"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department Safety');
            })->get();

            // Anda juga dapat mengambil data nilai komunikasi jika diperlukan
            $nilai_komunikasi = Tr_Nilai_Komunikasi::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        }elseif ($userRole === 'Kepala Dep.Environment') {
        // Jika pengguna memiliki peran "Admin Hrd" atau "Kepala Dep.Hrd"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "HRD"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department Environment');
            })->get();

            // Anda juga dapat mengambil data nilai komunikasi jika diperlukan
            $nilai_komunikasi = Tr_Nilai_Komunikasi::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        }
        else {
            // Pengguna dengan peran lain dapat melihat semua data
            $karyawan = Tr_Karyawan::all();

            // Anda juga dapat mengambil data nilai komunikasi jika diperlukan
            $nilai_komunikasi = Tr_Nilai_Komunikasi::all();
        }

        // Ambil data lain yang dibutuhkan, seperti indikator komunikasi, departemen, dan lainnya
        $indikator_komunikasi = Tr_Indikator_Komunikasi::all();
        $departments = Department::all();

        return view('nilai-komunikasi.index', compact('nilai_komunikasi', 'karyawan', 'departments', 'indikator_komunikasi'));
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
            $query->select('karyawan_id')->from('nilai_komunikasi');
        })
        ->get();

    $departments = Department::all();
    $indikator_komunikasi = Tr_Indikator_Komunikasi::first();

        // return view('nama_view', compact('karyawanBelumDipilih'));
        return view('nilai-komunikasi.create', compact('departments', 'indikator_komunikasi','karyawanBelumDinilai'));
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
         $totalNilaiKomunikasi = ($nilai_1 + $nilai_2 + $nilai_3) / 3;
         $totalNilaiKomunikasi = number_format($totalNilaiKomunikasi, 0);

         // Ambil departments_id dari data karyawan
         $departments_id = $karyawan->departments_id;

         // Simpan data ke dalam database dengan status "pending"
         $nilaikomunikasi = new Tr_Nilai_Komunikasi;
         $nilaikomunikasi->karyawan_id = $request->input('karyawan_id');
         $nilaikomunikasi->tgl_input = Carbon::now();
         $nilaikomunikasi->nilai_1 = $nilai_1;
         $nilaikomunikasi->nilai_2 = $nilai_2;
         $nilaikomunikasi->nilai_3 = $nilai_3;
         $nilaikomunikasi->departments_id = $departments_id;
         $nilaikomunikasi->total_nilai_komunikasi = $totalNilaiKomunikasi;
         $nilaikomunikasi->status_data_komunikasi = 'pending'; // Set status ke "pending"
         $nilaikomunikasi->save();

         return redirect('/nilai_komunikasi')->with('success', 'Penilaian Indikator karyawan berhasil disimpan');
     }

     /**
      * Display the specified resource.
      */

     public function show($id)
     {
         // Mengambil data nilai kinerja berdasarkan ID
         $nilai_komunikasi = Tr_Nilai_Komunikasi::findOrFail($id);

         // Mengambil data karyawan yang terkait dengan nilai komunikasi
         $karyawan = $nilai_komunikasi->karyawan;

         // Mengambil data indikator variabel terkait dengan nilai komunikasi
         //  $indikator_komunikasi = $nilai_komunikasi->indikatorkomunikasi;

         return view('nilai-komunikasi.show', compact('nilai_komunikasi', 'karyawan'));
     }

     /**
      * Show the form for editing the specified resource.
      */
     public function edit(string $id)
 {
     $nilai_komunikasi = Tr_Nilai_Komunikasi::with('karyawan')->findOrFail($id);
     $nama_karyawan = $nilai_komunikasi->karyawan->nama_karyawan;

     return view('nilai-komunikasi.edit', compact('nilai_komunikasi', 'nama_karyawan'));
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

     $nilai_komunikasi = Tr_Nilai_Komunikasi::findOrFail($id);

     // Lakukan pengecekan jika diperlukan, misalnya pengecekan karyawan nonaktif.

     $nilai_komunikasi->update([
         'nilai_1' => $request->input('nilai_1'),
         'nilai_2' => $request->input('nilai_2'),
         'nilai_3' => $request->input('nilai_3'),
         'total_nilai_komunikasi' => ($request->input('nilai_1') + $request->input('nilai_2') + $request->input('nilai_3')) / 3,
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
         $nilai_komunikasi->update([
             'status_data_komunikasi' => 'pending',
         ]);
     }

     return redirect()->route('nilai_komunikasi.index')->with('success', 'Data penilaian karyawan berhasil diperbarui');
 }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nilai_komunikasi = Tr_Nilai_Komunikasi::findOrFail($id);
        $nilai_komunikasi->delete();
        return redirect()->back();
    }
    public function approve($id)
    {
        try {
            // Temukan data nilai kinerja berdasarkan ID
            $nilaiKomunikasi = Tr_Nilai_Komunikasi::findOrFail($id);

            // Set status menjadi 'approved'
            $nilaiKomunikasi->status_data_komunikasi = 'approved';

            // Simpan perubahan
            $nilaiKomunikasi->save();

            // Redirect kembali ke view "show" dengan pesan sukses
            return redirect()->route('nilai_komunikasi.show', ['id' => $nilaiKomunikasi->id])->with('success', 'Status telah diubah menjadi approved');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function revisi($id)
{
    try {
        // Temukan data nilai kinerja berdasarkan ID
        $nilaiKomunikasi = Tr_Nilai_Komunikasi::findOrFail($id);

        // Set status menjadi 'Revisi'
        $nilaiKomunikasi->status_data_komunikasi = 'Revisi';

        // Simpan catatan revisi (diambil dari input form atau dari parameter)
        $catatanRevisi = request()->input('catatan_revisi');
        $nilaiKomunikasi->catatan_revisi = $catatanRevisi;

        // Simpan perubahan
        $nilaiKomunikasi->save();

        // Redirect kembali ke view "index" dengan pesan sukses
        return redirect()->route('nilai_komunikasi.index')->with('success', 'Status telah diubah menjadi Revisi');
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
    $nilaiKomunikasi = Tr_Nilai_Komunikasi::where('karyawan_id', $karyawan->id)->first();

    if (!$nilaiKomunikasi) {
        return 'Data nilai komunikasi tidak ditemukan';
    }

    // Ambil data indikator komunikasi (contoh, mengambil data indikator pertama)
    $indikatorKomunikasi = Tr_Indikator_Komunikasi::first();

    if (!$indikatorKomunikasi) {
        return 'Data indikator komunikasi tidak ditemukan';
    }

    // Membuat PDF dengan data dari tiga tabel
    $pdf = PDF::loadView('nilai-komunikasi.cetak-pdf', [
        'karyawan' => $karyawan,
        'nilai_komunikasi' => $nilaiKomunikasi,
        'indikator_komunikasi' => $indikatorKomunikasi,
    ]);

    // Menghasilkan dan mengunduh PDF
    return $pdf->download('Data_Komunikasi.pdf');
}

}
