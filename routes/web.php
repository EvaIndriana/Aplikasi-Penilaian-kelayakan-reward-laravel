<?php

use App\Http\Controllers\KaryawanNonAktifController;
use App\Http\Controllers\PenilaianFuzzyController;
use App\Http\Controllers\Tr_Nilai_KomunikasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Tr_KaryawanController;
use App\Http\Controllers\Tr_Indikator_KomunikasiController;
use App\Http\Controllers\Tr_Indikator_KinerjaController;
use App\Http\Controllers\Tr_Indikator_LoyalitasController;
use App\Http\Controllers\Nilai_KomunikasiController;
use App\Http\Controllers\Nilai_KinerjaController;
use App\Http\Controllers\Penilaian_FuzzyController;
use App\Http\Controllers\Nilai_LoyalitasController;
use App\Http\Controllers\KaryawanAktifController;
use App\Http\Controllers\KaryawanTidakAktifController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StatusTidakLayakController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StatusDipertimbangkanController;
use App\Http\Controllers\StatusLayakController;
use App\Http\Controllers\TahunPenilaianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/show-departements', [DashboardController::class, 'showdepartments']);
Route::post('/dashboard/cetak-laporan-karyawan', 'DashboardController@cetakLaporanKaryawan')->name('cetak-laporan-karyawan');


// Route::get('/dashboard/{id}/cetak-karyawan-departments',[DashboardController::class,'cetakLaporanKaryawan']);

Auth::routes();
Route::group(['middleware' => ['auth','checkUserRole:Admin Aplikasi,Admin Hrd,Pimpinan,Kepala Dep.Hrd,Kepala Dep.Environment,Kepala Dep.Engineering,Kepala Dep.Accounting,
Kepala Dep.Safety']], function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//user daftar pengguna
Route::resource('users', UserController::class);
Route::resource('profil', ProfilController::class);
//Profil pengguna

//departemen
Route::resource('departments', DepartmentController::class);
Route::get('/all-departments', [DepartmentController::class, 'showDep']);
Route::get('/cetak-departments', [DepartmentController::class, 'departments']);
Route::get('/cetak-hrd', [DepartmentController::class, 'cetak_hrd']);
Route::get('/cetak-environments', [DepartmentController::class, 'cetak_environment']);
Route::get('/cetak-engineering', [DepartmentController::class, 'cetak_engineering']);
Route::get('/cetak-accounting', [DepartmentController::class, 'cetak_accounting']);
Route::get('/cetak-safety', [DepartmentController::class, 'cetak_safety']);



//Karyawan
Route::resource('karyawan', Tr_KaryawanController::class);
//karyawan aktif
Route::resource('karyawan-aktif', KaryawanAktifController::class);
Route::get('/cetak-karyawan-aktif', [KaryawanAktifController::class, 'karyawanAktif']);
//karyawan non-aktif
Route::resource('karyawan-non-aktif', KaryawanTidakAktifController::class);
Route::get('/cetak-karyawan-non-aktif', [KaryawanTidakAktifController::class, 'karyawanTidakAktif']);

//Report Pdf
Route::get('/cetak-pdf', [Tr_KaryawanController::class, 'cetak_pdf_karyawan']);
Route::get('/karyawan/{id}/download-pdf',[Tr_KaryawanController::class, 'downloadPDF']);

//Indikator Komunikasi
Route::resource('indikator_komunikasi', Tr_Indikator_KomunikasiController::class);

//Indikator Kinerja
Route::resource('indikator_kinerja', Tr_Indikator_KinerjaController::class);

//Indikator Loyalitas
Route::resource('indikator_loyalitas', Tr_Indikator_LoyalitasController::class);

//indikator nilai komunikasi
Route::resource('nilai_komunikasi', Nilai_KomunikasiController::class);
Route::get('/get-karyawan-data/{id}',[Nilai_KomunikasiController::class, 'getData'] );
Route::post('/nilai_komunikasi/approve/{id}', [Nilai_KomunikasiController::class, 'approve'])->name('nilai_komunikasi.approve');
Route::post('/nilai_komunikasi/{id}/revisi', [Nilai_KomunikasiController::class, 'revisi'])->name('nilai_komunikasi.revisi');
Route::get('/nilai_komunikasi/{id}/download-pdf',[Nilai_KomunikasiController::class, 'downloadPDF']);

//indikator nilai kinerja
Route::resource('nilai_kinerja', Nilai_KinerjaController::class);
Route::get('/get-karyawan-data/{id}',[Nilai_KinerjaController::class, 'getData'] );
Route::post('/nilai_kinerja/approve/{id}', [Nilai_KinerjaController::class, 'approve'])->name('nilai_kinerja.approve');
Route::post('/nilai_kinerja/{id}/revisi', [Nilai_KinerjaController::class, 'revisi'])->name('nilai_kinerja.revisi');
Route::get('/nilai_kinerja/{id}/download-pdf',[Nilai_KinerjaController::class, 'downloadPDF']);

//indikator nilai Loyalitas
Route::resource('nilai_loyalitas', Nilai_LoyalitasController::class);
Route::get('/get-karyawan-data/{id}',[Nilai_KinerjaController::class, 'getData'] );
Route::post('/nilai_loyalitas/approve/{id}', [Nilai_LoyalitasController::class, 'approve'])->name('nilai_loyalitas.approve');
Route::post('/nilai_loyalitas/{id}/revisi', [Nilai_LoyalitasController::class, 'revisi'])->name('nilai_loyalitas.revisi');
Route::get('/nilai_loyalitas/{id}/download-pdf',[Nilai_LoyalitasController::class, 'downloadPDF']);

//penilaian fuzzy
Route::resource('penilaian_fuzzy', Penilaian_FuzzyController::class);
Route::get('/get-karyawan-data/{id}',[Penilaian_FuzzyController::class, 'getData'] );
Route::get('/penilaian_fuzzy/tidak-layak',[Penilaian_FuzzyController::class, 'tidak_layak'])->name('tidak-layak');;
Route::get('/tidak-layak-pdf', [StatusTidakLayakController::class, 'exportPdf']);
Route::get('/dipertimbangkan-pdf', [StatusDipertimbangkanController::class, 'exportPdf']);
Route::get('/layak-pdf', [StatusLayakController::class, 'exportPdf']);


// Route::post('/get-status-data/{id}',[Penilaian_FuzzyController::class, 'getStatusData'] );
// Route::get('/get-status-data/{id}',[Penilaian_FuzzyController::class, 'getStatusData'] );

//Laporan
Route::resource('report_laporan', LaporanController::class);
Route::resource('tidak-layak', StatusTidakLayakController::class);
Route::resource('dipertimbangkan', StatusDipertimbangkanController::class);
Route::resource('layak', StatusLayakController::class);
Route::resource('report_laporan', LaporanController::class);
// Route::get('/tidak-layak-pdf', [StatusTidakLayakController::class, 'exportPdf']);

//filter Tahun 2021
Route::get('/thn_2021', [TahunPenilaianController::class, 'tahun_2021']);
Route::get('/tidak-layak', [TahunPenilaianController::class, 'tidak_layak_2021']);
Route::get('/tidak-layak-pdf', [TahunPenilaianController::class, 'exportPdf']);
Route::get('/dipertimbangkan', [TahunPenilaianController::class, 'dipertimbangkan_2021']);
Route::get('/dipertimbangkan-pdf', [TahunPenilaianController::class, 'exportPdf_dipertimbangkan_2021']);
Route::get('/layak', [TahunPenilaianController::class, 'layak_2021']);
Route::get('/layak-pdf', [TahunPenilaianController::class, 'exportPdf_layak_2021']);


Route::get('/thn_2022', [TahunPenilaianController::class, 'tahun_2022']);
Route::get('/tidak-layak-2022', [TahunPenilaianController::class, 'tidak_layak_2022']);
Route::get('/tidak-layak-pdf-2022', [TahunPenilaianController::class, 'tidak_layak_pdf_2022']);
Route::get('/dipertimbangkan-2022', [TahunPenilaianController::class, 'dipertimbangkan_2022']);
Route::get('/dipertimbangkan-pdf-2022', [TahunPenilaianController::class, 'exportPdf_dipertimbangkan_2022']);
Route::get('/layak-2022', [TahunPenilaianController::class, 'layak_2022']);
Route::get('/layak-pdf-2022', [TahunPenilaianController::class, 'exportPdf_layak_2022']);


Route::get('/thn_2023', [TahunPenilaianController::class, 'tahun_2023']);
Route::get('/tidak-layak-2023', [TahunPenilaianController::class, 'tidak_layak_2023']);
Route::get('/tidak-layak-pdf-2023', [TahunPenilaianController::class, 'tidak_layak_pdf_2023']);
Route::get('/dipertimbangkan-2023', [TahunPenilaianController::class, 'dipertimbangkan_2023']);
Route::get('/dipertimbangkan-pdf-2023', [TahunPenilaianController::class, 'exportPdf_dipertimbangkan_2023']);
Route::get('/layak-2023', [TahunPenilaianController::class, 'layak_2023']);
Route::get('/layak-pdf-2023', [TahunPenilaianController::class, 'exportPdf_layak_2023']);

// Route::get('tampilanditolak',[App\Http\Controllers\SessionController::class, 'createditolak']);

//masih dipertimbangkan digunakan
// Route::get('/cetak-karyawan-aktif', [LaporanController::class, 'karyawanAktif']);
// Route::get('/cetak-karyawan-non-aktif', [LaporanController::class, 'karyawanTidakAktif']);
// Route::get('/report_laporan',  [LaporanController::class, 'showdepartments']);
// Route::get('/karyawan/{departmentId}/download-pdf', [Tr_KaryawanController::class, 'downloadPDF']);
// Route::get('/cetak-pdf', 'Tr_KaryawanController@cetak_pdf_karyawan')->name('cetak-pdf');
});
