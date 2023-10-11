<?php

namespace App\Http\Controllers;

use App\Models\Tr_Indikator_Kinerja;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Tr_Karyawan;
use App\Models\Tr_Nilai_Kinerja;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;



class Nilai_KinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            $nilai_kinerja = Tr_Nilai_Kinerja::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        } elseif ($userRole === 'Kepala Dep.Hrd') {
            // Jika pengguna memiliki peran "Admin Hrd" atau "Kepala Dep.Hrd"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "HRD"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department HRD');
            })->get();

            // Anda juga dapat mengambil data nilai kinerja jika diperlukan
            $nilai_kinerja = Tr_Nilai_Kinerja::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        } elseif ($userRole === 'Kepala Dep.Engineering') {
            // Jika pengguna memiliki peran "Admin Hrd" atau "Kepala Dep.Hrd"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "HRD"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department Engineering');
            })->get();

            // Anda juga dapat mengambil data nilai kinerja jika diperlukan
            $nilai_kinerja = Tr_Nilai_Kinerja::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        } elseif ($userRole === 'Kepala Dep.Safety') {
            // Jika pengguna memiliki peran "Admin Hrd" atau "Kepala Dep.Hrd"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "HRD"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department Safety');
            })->get();

            // Anda juga dapat mengambil data nilai kinerja jika diperlukan
            $nilai_kinerja = Tr_Nilai_Kinerja::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        } elseif ($userRole === 'Kepala Dep.Environment') {
            // Jika pengguna memiliki peran "Admin Hrd" atau "Kepala Dep.Hrd"
            // Maka hanya tampilkan karyawan yang terkait dengan departemen "HRD"
            $karyawan = Tr_Karyawan::whereHas('departments', function ($query) {
                $query->where('name', 'Department Environment');
            })->get();

            // Anda juga dapat mengambil data nilai kinerja jika diperlukan
            $nilai_kinerja = Tr_Nilai_Kinerja::whereIn('karyawan_id', $karyawan->pluck('id'))->get();
        } else {
            // Pengguna dengan peran lain dapat melihat semua data
            $karyawan = Tr_Karyawan::all();

            // Anda juga dapat mengambil data nilai kinerja jika diperlukan
            $nilai_kinerja = Tr_Nilai_Kinerja::all();
        }

        // Ambil data lain yang dibutuhkan, seperti indikator kinerja, departemen, dan lainnya
        $indikator_kinerja = Tr_Indikator_Kinerja::all();
        $departments = Department::all();

        return view('nilai-kinerja.index', compact('nilai_kinerja', 'karyawan', 'departments', 'indikator_kinerja'));
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


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil karyawan aktif yang belum dinilai
        $karyawanBelumDinilai = Tr_Karyawan::where('status_aktif_karyawan', true)
            ->whereNotIn('id', function ($query) {
                $query->select('karyawan_id')->from('nilai_kinerja');
            })
            ->get();

        $departments = Department::all();
        $indikator_kinerja = Tr_Indikator_Kinerja::first();

        return view('nilai-kinerja.create', compact('karyawanBelumDinilai', 'departments', 'indikator_kinerja'));
    }

    public function getData($id)
{
    try {
        $karyawan = DB::table('tr_karyawan')
            ->join('departments', 'tr_karyawan.departments_id', '=', 'departments.id')
            ->where('tr_karyawan.id', $id)
            ->select(
                'tr_karyawan.*',
                'departments.name' // Tambahkan kolom nama_departemen dari tabel departments
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
        $totalNilaiKinerja = ($nilai_1 + $nilai_2 + $nilai_3) / 3;
        $totalNilaiKinerja = number_format($totalNilaiKinerja, 0);

        // Ambil departments_id dari data karyawan
        $departments_id = $karyawan->departments_id;

        // Simpan data ke dalam database dengan status "pending"
        $nilaikinerja = new Tr_Nilai_Kinerja;
        $nilaikinerja->karyawan_id = $request->input('karyawan_id');
        $nilaikinerja->tgl_input = Carbon::now();
        $nilaikinerja->nilai_1 = $nilai_1;
        $nilaikinerja->nilai_2 = $nilai_2;
        $nilaikinerja->nilai_3 = $nilai_3;
        $nilaikinerja->departments_id = $departments_id;
        $nilaikinerja->total_nilai_kinerja = $totalNilaiKinerja;
        $nilaikinerja->status_data_kinerja = 'pending'; // Set status ke "pending"
        $nilaikinerja->save();

        return redirect('/nilai_kinerja')->with('success', 'Penilaian Indikator karyawan berhasil disimpan');
    }


    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        // Mengambil data nilai kinerja berdasarkan ID
        $nilai_kinerja = Tr_Nilai_Kinerja::findOrFail($id);
        $karyawan = $nilai_kinerja->karyawan;
        $departments = $nilai_kinerja->departments;

        return view('nilai-kinerja.show', compact('nilai_kinerja', 'karyawan', 'departments'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nilai_kinerja = Tr_Nilai_Kinerja::with('karyawan')->findOrFail($id);
        $nama_karyawan = $nilai_kinerja->karyawan->nama_karyawan;

        return view('nilai-kinerja.edit', compact('nilai_kinerja', 'nama_karyawan'));
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

        $nilai_kinerja = Tr_Nilai_Kinerja::findOrFail($id);

        // Lakukan pengecekan jika diperlukan, misalnya pengecekan karyawan nonaktif.

        $nilai_kinerja->update([
            'nilai_1' => $request->input('nilai_1'),
            'nilai_2' => $request->input('nilai_2'),
            'nilai_3' => $request->input('nilai_3'),
            'total_nilai_kinerja' => ($request->input('nilai_1') + $request->input('nilai_2') + $request->input('nilai_3')) / 3,
        ]);

        // Cek apakah pengguna yang melakukan pembaruan adalah admin HRD atau peran lain yang sesuai.
        if (
            in_array(Auth::user()->role, [
                'Admin Hrd',
                'Kepala Dep.Hrd',
                'Kepala Dep.Environment',
                'Kepala Dep.Engineering',
                'Kepala Dep.Accounting',
                'Kepala Dep.Safety',
            ])
        ) {
            // Jika iya, atur status menjadi "pending"
            $nilai_kinerja->update([
                'status_data_kinerja' => 'pending',
            ]);
        }

        return redirect()->route('nilai_kinerja.index')->with('success', 'Data penilaian karyawan berhasil diperbarui');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nilai_kinerja = Tr_Nilai_Kinerja::findOrFail($id);
        $nilai_kinerja->delete();
        return redirect()->back();
    }


    public function approve($id)
    {
        try {
            // Temukan data nilai kinerja berdasarkan ID
            $nilaiKinerja = Tr_Nilai_Kinerja::findOrFail($id);

            // Set status menjadi 'approved'
            $nilaiKinerja->status_data_kinerja = 'approved';

            // Simpan perubahan
            $nilaiKinerja->save();

            // Redirect kembali ke view "show" dengan pesan sukses
            return redirect()->route('nilai_kinerja.show', ['id' => $nilaiKinerja->id])->with('success', 'Status telah diubah menjadi approved');
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function revisi($id)
    {
        try {
            // Temukan data nilai kinerja berdasarkan ID
            $nilaiKinerja = Tr_Nilai_Kinerja::findOrFail($id);

            // Set status menjadi 'Revisi'
            $nilaiKinerja->status_data_kinerja = 'Revisi';

            // Simpan catatan revisi (diambil dari input form atau dari parameter)
            $catatanRevisi = request()->input('catatan_revisi');
            $nilaiKinerja->catatan_revisi = $catatanRevisi;

            // Simpan perubahan
            $nilaiKinerja->save();

            // Redirect kembali ke view "index" dengan pesan sukses
            return redirect()->route('nilai_kinerja.index')->with('success', 'Status telah diubah menjadi Revisi');
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
        $nilaiKinerja = Tr_Nilai_Kinerja::where('karyawan_id', $karyawan->id)->first();

        if (!$nilaiKinerja) {
            return 'Data nilai kinerja tidak ditemukan';
        }

        // Ambil data indikator kinerja (contoh, mengambil data indikator pertama)
        $indikatorKinerja = Tr_Indikator_Kinerja::first();

        if (!$indikatorKinerja) {
            return 'Data indikator kinerja tidak ditemukan';
        }

        // Membuat PDF dengan data dari tiga tabel
        $pdf = PDF::loadView('nilai-kinerja.cetak-pdf', [
            'karyawan' => $karyawan,
            'nilai_kinerja' => $nilaiKinerja,
            'indikator_kinerja' => $indikatorKinerja,
        ]);

        // Menghasilkan dan mengunduh PDF
        return $pdf->download('Data_Kinerja.pdf');
    }


}
