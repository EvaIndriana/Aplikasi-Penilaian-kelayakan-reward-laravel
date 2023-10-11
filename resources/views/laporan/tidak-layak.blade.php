
@extends('layoutsVuexy.master')
@section('contentvuexy')

<!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Daftar Karyawan</title>
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
                            <div class="card-body">
                                <h5 class="card-title">Department Accounting</h5><br>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="datatables4">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Emial</th>
                                                <th>Emial</th>
                                                <th>Emial</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $item)
                                            <tr>
                                                <td>{{ $item->karyawan->nama_karyawan }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>{{ $item->defuzifikasi }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">
                                {{--  <a href="{{ url('karyawan-aktif') }}" class="btn btn-primary w-100 mb-75 waves-effect waves-float waves-light">Karyawan Aktif</a>  --}}
                                {{--  <a href="{{ url('/cetak-accounting') }}"
                                    class="btn btn-outline-danger w-100 btn-download-invoice mb-75 waves-effect">Download
                                    PDF</a>  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- resources/views/laporan/index.blade.php -->
<table>
    <thead>
        <tr>
            <th>Nama Karyawan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{ $item->karyawan->nama_karyawan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

            </body>
            </html>
            @endsection




