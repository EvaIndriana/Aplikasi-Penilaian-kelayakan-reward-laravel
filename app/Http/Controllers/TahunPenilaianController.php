<?php

namespace App\Http\Controllers;

use App\Models\Penilaian_fuzzy;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TahunPenilaianController extends Controller
{
    public function tahun_2021()
    {
        $data = Penilaian_fuzzy::with('karyawan')
        ->where('tahun_input_reward', '2021')
        ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
        ->get();
    // dd($data);

        return view('penilaian.thn_2021', compact('data'));
    }
    public function tidak_layak_2021()
    {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Tidak Layak')
            ->whereYear('tahun_input_reward', '=', 2021) // Filter berdasarkan tahun
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();
        // dd($nilaiTidakLayak);
            return view('penilaian.tidak-layak', compact('data'));
    }

    public function exportPdf() {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Tidak Layak')
            ->whereYear('tahun_input_reward', '=', 2021)
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();

        $pdf = PDF::loadView('penilaian.tidak-layak-pdf-2021', compact('data'));

        return $pdf->download('Data Tidak Layak-2021.pdf');
    }

    public function dipertimbangkan_2021()
    {
        $data = Penilaian_fuzzy::with('karyawan')
        ->where('status', 'Dipertimbangkan')
        ->whereYear('tahun_input_reward', '=', 2021) // Filter berdasarkan tahun
        ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
        ->get();
    // dd($nilaiTidakLayak);

        return view('penilaian.dipertimbangkan', compact('data'));
    }

    public function exportPdf_dipertimbangkan_2021() {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Dipertimbangkan')
            ->whereYear('tahun_input_reward', '=', 2021)
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();

        $pdf = PDF::loadView('penilaian.dipertimbangkan-pdf-2021', compact('data'));

        return $pdf->download('Data Dipertimbangkan-2021.pdf');
    }

    public function layak_2021()
    {
        $data = Penilaian_fuzzy::with('karyawan')
        ->where('status', 'Layak')
        ->whereYear('tahun_input_reward', '=', 2021) // Filter berdasarkan tahun
        ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
        ->get();
    // dd($nilaiTidakLayak);

        return view('penilaian.layak', compact('data'));
    }

    public function exportPdf_layak_2021() {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Layak')
            ->whereYear('tahun_input_reward', '=', 2021)
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();

        $pdf = PDF::loadView('penilaian.layak-pdf-2021', compact('data'));

        return $pdf->download('Data Layak-2021.pdf');
    }


    public function tahun_2022()
    {
        $data = Penilaian_fuzzy::with('karyawan')
        ->where('tahun_input_reward', '2022')
        ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
        ->get();
    // dd($data);

        return view('penilaian.thn_2022', compact('data'));
    }

    public function tidak_layak_2022()
    {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Tidak Layak')
            ->whereYear('tahun_input_reward', '=', 2022) // Filter berdasarkan tahun
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();
        // dd($nilaiTidakLayak);
            return view('penilaian.tidak-layak-2022', compact('data'));
    }

    public function tidak_layak_pdf_2022() {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Tidak Layak')
            ->whereYear('tahun_input_reward', '=', 2022)
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();

        $pdf = PDF::loadView('penilaian.tidak-layak-pdf-2022', compact('data'));

        return $pdf->download('Data Tidak Layak-2022.pdf');
    }

    public function dipertimbangkan_2022()
    {
        $data = Penilaian_fuzzy::with('karyawan')
        ->where('status', 'Dipertimbangkan')
        ->whereYear('tahun_input_reward', '=', 2022) // Filter berdasarkan tahun
        ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
        ->get();
    // dd($nilaiTidakLayak);

        return view('penilaian.dipertimbangkan-2022', compact('data'));
    }

    public function exportPdf_dipertimbangkan_2022() {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Dipertimbangkan')
            ->whereYear('tahun_input_reward', '=', 2022)
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();

        $pdf = PDF::loadView('penilaian.dipertimbangkan-pdf-2022', compact('data'));

        return $pdf->download('Data Dipertimbangkan-2022.pdf');
    }

    public function layak_2022()
    {
        $data = Penilaian_fuzzy::with('karyawan')
        ->where('status', 'Layak')
        ->whereYear('tahun_input_reward', '=', 2022) // Filter berdasarkan tahun
        ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
        ->get();
    // dd($nilaiTidakLayak);

        return view('penilaian.layak-2022', compact('data'));
    }

    public function exportPdf_layak_2022() {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Layak')
            ->whereYear('tahun_input_reward', '=', 2022)
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();

        $pdf = PDF::loadView('penilaian.layak-pdf-2022', compact('data'));

        return $pdf->download('Data Layak-2022.pdf');
    }


    public function tahun_2023()
    {
        $data = Penilaian_fuzzy::with('karyawan')
        ->where('tahun_input_reward', '2023')
        ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
        ->get();
    // dd($data);

        return view('penilaian.thn_2023', compact('data'));
    }

    public function tidak_layak_2023()
    {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Tidak Layak')
            ->whereYear('tahun_input_reward', '=', 2023) // Filter berdasarkan tahun
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();
        // dd($nilaiTidakLayak);
            return view('penilaian.tidak-layak-2023', compact('data'));
    }

    public function tidak_layak_pdf_2023() {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Tidak Layak')
            ->whereYear('tahun_input_reward', '=', 2023)
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();

        $pdf = PDF::loadView('penilaian.tidak-layak-pdf-2023', compact('data'));

        return $pdf->download('Data Tidak Layak-2023.pdf');
    }

    public function dipertimbangkan_2023()
    {
        $data = Penilaian_fuzzy::with('karyawan')
        ->where('status', 'Dipertimbangkan')
        ->whereYear('tahun_input_reward', '=', 2023) // Filter berdasarkan tahun
        ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
        ->get();
    // dd($nilaiTidakLayak);

        return view('penilaian.dipertimbangkan-2023', compact('data'));
    }

    public function exportPdf_dipertimbangkan_2023() {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Dipertimbangkan')
            ->whereYear('tahun_input_reward', '=', 2023)
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();

        $pdf = PDF::loadView('penilaian.dipertimbangkan-pdf-2023', compact('data'));

        return $pdf->download('Data Dipertimbangkan-2023.pdf');
    }

    public function layak_2023()
    {
        $data = Penilaian_fuzzy::with('karyawan')
        ->where('status', 'Layak')
        ->whereYear('tahun_input_reward', '=', 2023) // Filter berdasarkan tahun
        ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
        ->get();
    // dd($nilaiTidakLayak);

        return view('penilaian.layak-2023', compact('data'));
    }

    public function exportPdf_layak_2023() {
        $data = Penilaian_fuzzy::with('karyawan')
            ->where('status', 'Layak')
            ->whereYear('tahun_input_reward', '=', 2023)
            ->select('karyawan_id', 'nilai_kinerja_id', 'nilai_komunikasi_id', 'nilai_loyalitas_id', 'status', 'defuzzyfikasi')
            ->get();

        $pdf = PDF::loadView('penilaian.layak-pdf-2023', compact('data'));

        return $pdf->download('Data Layak-2023.pdf');
    }

}
