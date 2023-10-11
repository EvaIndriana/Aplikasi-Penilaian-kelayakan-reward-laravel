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
                                <h5 class="card-title">Daftar Karyawan Tidak Aktif </h5>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="datatables">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>Status Karyawan</th>
                                                <th>Dibuat</th>
                                                <th>Tanggal Non-Aktif</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Isi tabel dengan data dari Laravel -->
                                            @if ($karyawanTidakAktif)
                                                @foreach ($karyawanTidakAktif as $item)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td>{{ $item->nama_karyawan }}</td>
                                                        <td>{{ $item->status_aktif_karyawan ? 'Aktif' : 'Non-Aktif' }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($item->tanggal_nonaktif)->format('d-M-Y') }}</td>
                                                        {{--  <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d-M-Y') }}</td>  --}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ url('karyawan') }}" class="btn btn-primary w-100 mb-75 waves-effect waves-float waves-light">Data Karyawan</a>
                                <a href="{{ url('/cetak-karyawan-non-aktif') }}" class="btn btn-outline-danger w-100 btn-download-invoice mb-75 waves-effect">Download PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </body>
            </html>
            <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
            <script type="text/javascript">
                new DataTable('#datatables');
            </script>
            @endsection
