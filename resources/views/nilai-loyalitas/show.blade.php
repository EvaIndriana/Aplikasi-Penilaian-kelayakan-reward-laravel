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
                    <li class="breadcrumb-item"><a href="{{ url('karyawan') }}">Karyawan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h5>Detail Karyawan</h5>
                            </div>
                            <div class="card-body">
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
                                        <td></td>
                                    </tr>

                                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ url('nilai_loyalitas') }}" class="btn btn-primary w-100 mb-75 waves-effect waves-float waves-light">Kembali</a>
                                <a href="{{ url('/nilai_loyalitas/' . $karyawan->id . '/download-pdf') }}"
                                    class="btn btn-outline-danger w-100 btn-download-invoice mb-75 waves-effect">Download PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Detail Nilai loyalitas
                            </div>
                            <div class="card-body">
                                <table class="table">

                                    <tr>
                                        <th>Kualitas kerja - Kualitas kerja dapat dilihat dari ketepatan kerja, ketelitian, keterampilan,dan kebersihan dari kerja seseorang.</th>
                                        <td>{{ $nilai_loyalitas->nilai_1 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sikap kerja - Sikap kerja terdiri dari sikap terhadap perusahaan,karyawan lain dan pekerjaan serta kerjasama.</th>
                                        <td>{{ $nilai_loyalitas->nilai_2 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Keandalan kerja - Keandalan kerja terdiri dari mengikuti intruksi, inisiatif, hati-hatian, kerajinan

                                        </th>
                                        <td>{{ $nilai_loyalitas->nilai_3 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ $nilai_loyalitas->status_data_loyalitas}}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Nilai</th>
                                        <td>{{ $nilai_loyalitas->total_nilai_loyalitas }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>

@endsection
