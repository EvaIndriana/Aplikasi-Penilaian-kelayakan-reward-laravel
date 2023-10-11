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
                                <div>
                                    {{--  <a href="{{ url('karyawan') }}" class="btn bg-gradient-info">Kembali</a>  --}}
                                    {{--  <a href="{{ url('/karyawan/'.$karyawan->id.'/download-pdf') }}" class="btn bg-gradient-danger" target="_blank"><i class="fa-regular fa-file-pdf" style="font-size: 25px"></i></a>  --}}
                                </div>
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
                                        <th>Tempat Lahir</th>
                                        <td> {{ $karyawan->tempat_lahir }}</td>
                                    </tr>

                                    <tr>
                                        <th>Alamat</th>
                                        <td> {{ $karyawan->alamat }}</td>
                                    </tr>

                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td> {{ $karyawan->jenis_kelamin }}</td>
                                    </tr>

                                    <tr>
                                        <th>Pendidikan</th>
                                        <td> {{ $karyawan->pendidikan }}</td>
                                    </tr>

                                    <tr>
                                        <th>Agama</th>
                                        <td> {{ $karyawan->agama }}</td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <td> {{ $karyawan->status }}</td>
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
                                <a href="{{ url('karyawan') }}" class="btn btn-primary w-100 mb-75 waves-effect waves-float waves-light">Kembali</a>
                                <a href="{{ url('/karyawan/' . $karyawan->id . '/download-pdf') }}"
                                    class="btn btn-outline-danger w-100 mb-75 waves-effect waves-float waves-light" target="_blank">Download</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </body>

    </html>

@endsection
