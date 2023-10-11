@extends('layoutsVuexy.master')
@section('contentvuexy')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
</head>

<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('penilaian_fuzzy') }}">Penilaian Akhir</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>

    <div class="container" style="padding-top: 20px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Nilai Akhir</h5>
                        <div>

                            <div class="col-md-12">
                                <div class="card text-center">
                                    <div class="card-header py-2">
                                        <ul class="nav nav-pills card-header-pills ms-0" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                                    href="#pills-home" role="tab" aria-controls="pills-home"
                                                    aria-selected="true">Data Karyawan</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                    href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                    aria-selected="false">Nilai Kinerja</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-loyalitas-tab" data-bs-toggle="pill"
                                                    href="#pills-loyalitas" role="tab" aria-controls="pills-loyalitas"
                                                    aria-selected="false">Loyalitas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link">Cetak Pdf</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content" id="pills-tabContent" style="width: 100%">
                                            <div class="tab-pane fade active show" id="pills-home" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <div class="card mb-12">
                                                    <div class="card-body">
                                                        <h4 style="text-align: left">Data Karyawan</h4>
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Nama Karyawan</th>
                                                                    <td>{{ $karyawan->nama_karyawan }}</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>NIK Karyawan</th>
                                                                    <td>{{ $karyawan->nik_karyawan }}</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Departements</th>
                                                                    <td>{{ $karyawan->departments->name }}</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Status Karyawan</th>
                                                                    <td>{{ $karyawan->status_aktif_karyawan ? 'Aktif' : 'Non-Aktif' }}</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td>{{ $karyawan->email }}</td>
                                                                </tr>

                                                                <tr>
                                                                    <th>No Handphone</th>
                                                                    <td>{{ $karyawan->no_hp }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status Pekerjaan </th>
                                                                    <td> {{ $karyawan->status_pekerjaan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pendidikan </th>
                                                                    <td> {{ $karyawan->pendidikan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Agama </th>
                                                                    <td> {{ $karyawan->agama }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                </tr>

                                                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                                            </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                aria-labelledby="pills-profile-tab">
                                                <h4 class="card-title" style="text-align: left">Penilaian Indikator Kinerja</h4>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12">


                                                            {{--  <table class="table">

                                                                <tr>
                                                                    <th>Kualitas kerja - Kualitas kerja dapat dilihat dari ketepatan kerja, ketelitian, keterampilan,dan kebersihan dari kerja seseorang.</th>
                                                                    <td>{{ $nilai_kinerja->nilai_1 }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Sikap kerja - Sikap kerja terdiri dari sikap terhadap perusahaan,karyawan lain dan pekerjaan serta kerjasama.</th>
                                                                    <td>{{ $nilai_kinerja->nilai_2 }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Keandalan kerja - Keandalan kerja terdiri dari mengikuti intruksi, inisiatif, hati-hatian, kerajinan

                                                                    </th>
                                                                    <td>{{ $nilai_kinerja->nilai_3 }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <td>{{ $nilai_kinerja->status_data_kinerja }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total Nilai</th>
                                                                    <td>{{ $nilai_kinerja->total_nilai_kinerja }}</td>
                                                                </tr>
                                                            </table>  --}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="pills-loyalitas" role="tabpanel"
                                                aria-labelledby="pills-loyalitas-tab">
                                                <h4 class="card-title">Penilaian Loyalitas</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to
                                                    additional content.</p>
                                                <a href="#" class="btn btn-outline-primary waves-effect">Go profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
@endsection
