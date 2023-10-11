<?php

namespace App\Http\Controllers;

use App\Models\Tr_Indikator_Kinerja;
use App\Models\Tr_Nilai_Kinerja;
use App\Models\Tr_Nilai_Komunikasi;
use App\Models\Tr_Nilai_Loyalitas;
use Illuminate\Http\Request;
use App\Models\Penilaian_fuzzy;
use App\Models\Tr_Karyawan;
use App\Helpers\fuzzyHelper;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Penilaian_FuzzyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $penilaian_fuzzy = Penilaian_fuzzy::all();
        // dd($penilaian_fuzzy);
        return view('penilaian.index', compact('penilaian_fuzzy'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawanBelumDinilai = Tr_Karyawan::where('status_aktif_karyawan', true)
            ->whereNotIn('id', function ($query) {
                $query->select('karyawan_id')->from('penilaian_fuzzy');
            })
            ->get();
        $penilaian_fuzzy = Penilaian_fuzzy::all();
        return view('penilaian.create', compact('karyawanBelumDinilai', 'penilaian_fuzzy'));
    }

    public function getData($id)
    {
        try {
            $karyawan = DB::table('tr_karyawan')
                ->where('tr_karyawan.id', $id)
                ->leftJoin('nilai_kinerja', 'tr_karyawan.id', '=', 'nilai_kinerja.karyawan_id')
                ->leftJoin('nilai_komunikasi', 'tr_karyawan.id', '=', 'nilai_komunikasi.karyawan_id')
                ->leftJoin('nilai_loyalitas', 'tr_karyawan.id', '=', 'nilai_loyalitas.karyawan_id')
                ->select(
                    'tr_karyawan.*',
                    'nilai_kinerja.total_nilai_kinerja',
                    'nilai_kinerja.status_data_kinerja',
                    // Tambahkan ini
                    'nilai_komunikasi.total_nilai_komunikasi',
                    'nilai_komunikasi.status_data_komunikasi',
                    'nilai_loyalitas.total_nilai_loyalitas',
                    'nilai_loyalitas.status_data_loyalitas',
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

    public static function kinerjaBuruk($kinerja)
    {
        if ($kinerja <= 0) {
            return 1;
        } elseif ($kinerja > 0 && $kinerja <= 30) {
            return (30 - $kinerja) / 10;
        } elseif ($kinerja > 30 && $kinerja < 40) {
            return (40 - $kinerja) / 10;
        } else {
            return 0;
        }
    }

    public static function kinerjaCukup($kinerja)
    {
        if ($kinerja < 30) {
            return 0;
        } elseif ($kinerja >= 30 && $kinerja <= 70) {
            return ($kinerja - 30) / 10;
        } elseif ($kinerja > 70 && $kinerja < 80) {
            return (80 - $kinerja) / 10;
        } else {
            return 0;
        }
    }

    public static function kinerjaBaik($kinerja)
    {
        if ($kinerja < 70) {
            return 0;
        } elseif ($kinerja >= 70 && $kinerja < 100) {
            return ($kinerja - 70) / 10;
        } else {
            return 1;
        }
    }

    public static function komunikasiBuruk($komunikasi)
    {
        if ($komunikasi <= 0) {
            return 1;
        } elseif ($komunikasi > 0 && $komunikasi <= 30) {
            return (30 - $komunikasi) / 10;
        } elseif ($komunikasi > 30 && $komunikasi < 40) {
            return (40 - $komunikasi) / 10;
        } else {
            return 0;
        }
    }

    public static function komunikasiCukup($komunikasi)
    {
        if ($komunikasi < 30) {
            return 0;
        } elseif ($komunikasi >= 30 && $komunikasi <= 70) {
            return ($komunikasi - 30) / 10;
        } elseif ($komunikasi > 70 && $komunikasi < 80) {
            return (80 - $komunikasi) / 10;
        } else {
            return 0;
        }
    }

    public static function komunikasiBaik($komunikasi)
    {
        if ($komunikasi < 70) {
            return 0;
        } elseif ($komunikasi >= 70 && $komunikasi < 100) {
            return ($komunikasi - 70) / 10;
        } else {
            return 1;
        }
    }

    public static function loyalitasBuruk($loyalitas)
    {
        if ($loyalitas <= 0) {
            return 1;
        } elseif ($loyalitas > 0 && $loyalitas <= 30) {
            return (30 - $loyalitas) / 10;
        } elseif ($loyalitas > 30 && $loyalitas < 40) {
            return (40 - $loyalitas) / 10;
        } else {
            return 0;
        }
    }

    public static function loyalitasCukup($loyalitas)
    {
        if ($loyalitas < 30) {
            return 0;
        } elseif ($loyalitas >= 30 && $loyalitas <= 70) {
            return ($loyalitas - 30) / 10;
        } elseif ($loyalitas > 70 && $loyalitas < 80) {
            return (80 - $loyalitas) / 10;
        } else {
            return 0;
        }
    }

    public static function loyalitasBaik($loyalitas)
    {
        if ($loyalitas < 70) {
            return 0;
        } elseif ($loyalitas >= 70 && $loyalitas < 100) {
            return ($loyalitas - 70) / 10;
        } else {
            return 1;
        }
    }

    public static function getRekomendasi($kinerja, $komunikasi, $loyalitas)
    {
        $kinerjaBuruk = self::kinerjaBuruk($kinerja);
        $kinerjaCukup = self::kinerjaCukup($kinerja);
        $kinerjaBaik = self::kinerjaBaik($kinerja);

        $komunikasiBuruk = self::komunikasiBuruk($komunikasi);
        $komunikasiCukup = self::komunikasiCukup($komunikasi);
        $komunikasiBaik = self::komunikasiBaik($komunikasi);

        $loyalitasBuruk = self::loyalitasBuruk($loyalitas);
        $loyalitasCukup = self::loyalitasCukup($loyalitas);
        $loyalitasBaik = self::loyalitasBaik($loyalitas);

        $rules = []; // Array untuk menyimpan nilai minimum dari setiap aturan
        $z = []; // Array untuk menyimpan nilai defuzzifikasi dari setiap aturan

        // rule1 tidak layak
        $rules[1] = min($kinerjaBuruk, $komunikasiBuruk, $loyalitasBuruk);
        $z[1] = 40 - ($rules[1] * 10); //Tidak Layak

        // rule2 tidak layak
        $rules[2] = min($kinerjaBuruk, $komunikasiBuruk, $loyalitasCukup);
        $z[2] = 40 - ($rules[2] * 10); //Tidak Layak

        //rule3
        $rules[3] = min($kinerjaBuruk, $komunikasiBuruk, $loyalitasBaik);
        $z[3] = 40 - ($rules[3] * 10); //Tidak Layak

        //rule4
        $rules[4] = min($kinerjaBuruk, $komunikasiCukup, $loyalitasBuruk);
        $z4a = 30 + ($rules[4] * 10);
        $z4b = 80 - ($rules[4] * 10);
        // (10 * $rules[14]);
        $z[4] = ($z4a + $z4b) / 2; // Dipertimbangkan

        //rule5
        $rules[5] = min($kinerjaBuruk, $komunikasiCukup, $loyalitasCukup);
        $z5a = 30 + ($rules[5] * 10);
        $z5b = 80 - ($rules[5] * 10);
        $z[5] = ($z5a + $z5b) / 2; // Dipertimbangkan

        //rule6
        $rules[6] = min($kinerjaBuruk, $komunikasiCukup, $loyalitasBaik);
        $z6a = 30 + ($rules[6] * 10);
        $z6b = 80 - ($rules[6] * 10);
        $z[6] = ($z6a + $z6b) / 2; // Dipertimbangkan

        //rule7
        $rules[7] = min($kinerjaBuruk, $komunikasiBaik, $loyalitasBuruk);
        $z7a = 30 + ($rules[7] * 10);
        $z7b = 80 - ($rules[7] * 10);
        $z[7] = ($z7a + $z7b) / 2; // Dipertimbangkan

        //rule8
        $rules[8] = min($kinerjaBuruk, $komunikasiBaik, $loyalitasCukup);
        $z8a = 30 + ($rules[8] * 10);
        $z8b = 80 - ($rules[8] * 10);
        $z[8] = ($z8a + $z8b) / 2; // Dipertimbangkan

        //rule9
        $rules[9] = min($kinerjaBuruk, $komunikasiBaik, $loyalitasBaik);
        $z9a = 30 + ($rules[9] * 10);
        $z9b = 80 - ($rules[9] * 10);
        $z[9] = ($z9a + $z9b) / 2; // Dipertimbangkan


        //rule10
        $rules[10] = min($kinerjaCukup, $komunikasiBuruk, $loyalitasBuruk);
        $z[10] = 40 - ($rules[10] * 10); //Tidak Layak

        //rule11
        $rules[11] = min($kinerjaCukup, $komunikasiBuruk, $loyalitasCukup);
        $z[11] = 40 - ($rules[11] * 10); //Tidak Layak

        //rule12
        $rules[12] = min($kinerjaCukup, $komunikasiBuruk, $loyalitasBaik);
        $z[12] = (40 - $rules[12]) / 10; //Tidak Layak

        //rule13
        $rules[13] = min($kinerjaCukup, $komunikasiCukup, $loyalitasBuruk);
        $z13a = 30 + ($rules[13] * 10);
        $z13b = 80 - ($rules[13] * 10);
        $z[13] = ($z13a + $z13b) / 2; // Dipertimbangkan

        //rule14
        $rules[14] = min($kinerjaCukup, $komunikasiCukup, $loyalitasCukup);
        $z14a = 30 + ($rules[14] * 10);
        $z14b = 80 - ($rules[14] * 10);
        $z[14] = ($z14a + $z14b) / 2; // Dipertimbangkan

        //rule15
        $rules[15] = min($kinerjaCukup, $komunikasiCukup, $loyalitasBaik);
        // $z[15] = 70 - (10 * $rules[15]); // Layak
        $z[15] = 70 - (10 * $rules[15]);

        //rule16
        $rules[16] = min($kinerjaCukup, $komunikasiBaik, $loyalitasBuruk);
        $z16a = 30 + ($rules[16] * 10);
        $z16b = 80 - ($rules[16] * 10);
        $z[16] = ($z16a + $z16b) / 2; // Dipertimbangkan

        //rule17
        $rules[17] = min($kinerjaCukup, $komunikasiBaik, $loyalitasCukup);
        $z17a = 30 + ($rules[17] * 10);
        $z17b = 80 - ($rules[17] * 10);
        $z[17] = ($z17a + $z17b) / 2; // Dipertimbangkan

        //rule18
        $rules[18] = min($kinerjaCukup, $komunikasiBaik, $loyalitasBaik);
        $z[18] = 70 + (10 * $rules[18]); // Layak

        //rule19
        $rules[19] = min($kinerjaBaik, $komunikasiBuruk, $loyalitasBuruk);
        $z[19] = 40 - ($rules[19] * 10); //Tidak Layak

        //rule20
        $rules[20] = min($kinerjaBaik, $komunikasiBuruk, $loyalitasCukup);
        // $z[20] = 40 - (10 * $rules[20]); // Tidak Layak
        $z[20] = 40 - ($rules[20] * 10); //Tidak Layak

        //rule21
        $rules[21] = min($kinerjaBaik, $komunikasiBuruk, $loyalitasBaik);
        $z21a = 30 + ($rules[21] * 10);
        $z21b = 80 - ($rules[21] * 10);
        $z[21] = ($z21a + $z21b) / 2; // Dipertimbangkan

        //rule22
        $rules[22] = min($kinerjaBaik, $komunikasiCukup, $loyalitasBuruk);
        $z22a = 30 + ($rules[22] * 10);
        $z22b = 80 - ($rules[22] * 10);
        $z[22] = ($z22a + $z22b) / 2; // Dipertimbangkan

        //rule23
        $rules[23] = min($kinerjaBaik, $komunikasiCukup, $loyalitasCukup);
        $z[23] = 70 + (10 * $rules[23]);// Layak

        //rule24
        $rules[24] = min($kinerjaBaik, $komunikasiCukup, $loyalitasBaik);
        $z[24] = 70 + (10 * $rules[24]); // Layak

        //rule25
        $rules[25] = min($kinerjaBaik, $komunikasiBaik, $loyalitasBuruk);
        $z[25] = 70 + (10 * $rules[25]);// Layak


        //rule26
        $rules[26] = min($kinerjaBaik, $komunikasiBaik, $loyalitasCukup);
        $z[26] = 70 + (10 * $rules[26]); // Layak


        //rule27
        $rules[27] = min($kinerjaBaik, $komunikasiBaik, $loyalitasBaik);
        $z[27] = 70 + (10 * $rules[27]); // Layak


        $totalWeightedZ = 0; //
        $totalRules = 0; //

        for($i = 1; $i <= 27; $i++) {
            $totalWeightedZ += $rules[$i] * $z[$i];
            $totalRules += $rules[$i];
        }

        $nilaiDefuzzifikasi = $totalWeightedZ / $totalRules;
        if($nilaiDefuzzifikasi <= 40) {
            $rekomendasi = "Tidak Layak";
        } elseif($nilaiDefuzzifikasi >= 40 && $nilaiDefuzzifikasi <= 70) {
            $rekomendasi = "Dipertimbangkan";
        } else {
            $rekomendasi = "Layak";
        }


        return [
            'rekomendasi' => $rekomendasi,
            'nilaiDefuzzifikasi' => $nilaiDefuzzifikasi
        ];
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'karyawan_id' => 'required',
            'nik_karyawan' => 'required',
            'tahun_input_reward' => 'required',
            'nilai_kinerja_id' => 'required',
            'nilai_komunikasi_id' => 'required',
            'nilai_loyalitas_id' => 'required',
            'status_ket_kinerja' => 'required',
            'status_ket_komunikasi' => 'required',
            'status_ket_loyalitas' => 'required',
        ]);

        // Ambil data dari request nilai total
        $kinerja = $request->nilai_kinerja_id;
        $komunikasi = $request->nilai_komunikasi_id;
        $loyalitas = $request->nilai_loyalitas_id;

        // Ambil status data
        $status_kinerja = $request->status_ket_kinerja;
        $status_komunikasi = $request->status_ket_komunikasi;
        $status_loyalitas = $request->status_ket_loyalitas;

        $result = self::getRekomendasi($kinerja, $komunikasi, $loyalitas);
        // Cek apakah semua status adalah "approved"
        if (
            ($status_kinerja !== 'approved') ||
            ($status_komunikasi !== 'approved') ||
            ($status_loyalitas !== 'approved')
        ) {
            return redirect()->back()->with('error', 'Data tidak bisa disimpan karena salah satu data masih belum disetujui Kepala Departments');
        }

        // Simpan data ke dalam tabel 'penilaian_fuzzy'
        DB::table('penilaian_fuzzy')->insert([
            'karyawan_id' => $request->karyawan_id,
            'tahun_input_reward'=> now()->year,
            'nilai_kinerja_id' => $kinerja,
            'nilai_komunikasi_id' => $komunikasi,
            'nilai_loyalitas_id' => $loyalitas,
            'status_ket_kinerja' => $status_kinerja,
            'status_ket_komunikasi' => $status_komunikasi,
            'status_ket_loyalitas' => $status_loyalitas,
            'status'     => $result['rekomendasi'],
            'defuzzyfikasi' => $result['nilaiDefuzzifikasi'],
            'tgl_input' => now(),
        ]);

        return redirect('/penilaian_fuzzy')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $penilaian_fuzzy = Penilaian_fuzzy::findOrFail($id);
        $nilaiKinerja = $penilaian_fuzzy->nilaiKinerja;
        $karyawan = $penilaian_fuzzy->karyawan;
        $departments = $penilaian_fuzzy->departments;
        return view('penilaian.show', compact('karyawan', 'penilaian_fuzzy', 'departments', 'nilaiKinerja'));
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
          // Temukan data penilaian fuzzy berdasarkan ID
    $penilaian_fuzzy = Penilaian_fuzzy::findOrFail($id);
    // Hapus data dari tabel nilai_kinerja sesuai dengan karyawan_id
    $penilaian_fuzzy->nilai_Kinerja()->where('karyawan_id', $penilaian_fuzzy->karyawan_id)->delete();
    $penilaian_fuzzy->nilai_Komunikasi()->where('karyawan_id', $penilaian_fuzzy->karyawan_id)->delete();
    $penilaian_fuzzy->nilai_Loyalitas()->where('karyawan_id', $penilaian_fuzzy->karyawan_id)->delete();
    // Hapus data dari tabel penilaian_fuzzy
    $penilaian_fuzzy->delete();
    return redirect()->back();

    // Redirect kembali atau berikan respons sesuai kebutuhan Anda
        // $penilaian_fuzzy = Penilaian_fuzzy::findOrFail($id);
        // $penilaian_fuzzy->delete();
        // return redirect()->back();
    }

    public function tidak_layak()
    {
        return view('penilaian.tidak-layak');
    }
}
