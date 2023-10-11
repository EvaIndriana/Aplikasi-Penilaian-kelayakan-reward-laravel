@extends('layoutsVuexy.master')
@section('contentvuexy')
    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
            <title>Daftar Karyawan</title>
        </head>

        <body>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('departments') }}">Department</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Department HRD (Human Resources Departement)</h5><br>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="datatables">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Emial</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Isi tabel dengan data dari Laravel -->
                                            @foreach ($DepartemenHRD as $karyawan)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $karyawan->nama_karyawan }}</td>
                                                <td>{{ $karyawan->nik_karyawan }}</td>
                                                <td>{{ $karyawan->email }}</td>
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
                                <a href="{{ url('/cetak-hrd') }}"
                                    class="btn btn-outline-danger w-100 btn-download-invoice mb-75 waves-effect">Download
                                    PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Department Environment</h5><br>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="datatables1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Emial</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Isi tabel dengan data dari Laravel -->
                                            @foreach ($DepartmentEnvironment as $karyawan)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $karyawan->nama_karyawan }}</td>
                                                <td>{{ $karyawan->nik_karyawan }}</td>
                                                <td>{{ $karyawan->email }}</td>
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
                                <a href="{{ url('/cetak-environments') }}"
                                    class="btn btn-outline-danger w-100 btn-download-invoice mb-75 waves-effect">Download
                                    PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Department Enggineering</h5><br>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="datatables3">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>NIK</th>
                                                <th>Emial</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Isi tabel dengan data dari Laravel -->
                                            @foreach ($DepartmentEngineering  as $karyawan)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $karyawan->nama_karyawan }}</td>
                                                <td>{{ $karyawan->nik_karyawan }}</td>
                                                <td>{{ $karyawan->email }}</td>
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
                                <a href="{{ url('/cetak-engineering') }}"
                                    class="btn btn-outline-danger w-100 btn-download-invoice mb-75 waves-effect">Download
                                    PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Isi tabel dengan data dari Laravel -->
                                            @foreach ($DepartmentAccounting  as $karyawan)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $karyawan->nama_karyawan }}</td>
                                                <td>{{ $karyawan->nik_karyawan }}</td>
                                                <td>{{ $karyawan->email }}</td>
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
                                <a href="{{ url('/cetak-accounting') }}"
                                    class="btn btn-outline-danger w-100 btn-download-invoice mb-75 waves-effect">Download
                                    PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Department Safety</h5><br>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="datatables5">
                                        <thead>
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th>Nama</th>
                                                    <th>NIK</th>
                                                    <th>Emial</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                            <!-- Isi tabel dengan data dari Laravel -->
                                            @foreach ($DepartmentSafety as $karyawan)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $karyawan->nama_karyawan }}</td>
                                                    <td>{{ $karyawan->nik_karyawan }}</td>
                                                    <td>{{ $karyawan->email }}</td>
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
                                <a href="{{ url('/cetak-safety') }}"
                                    class="btn btn-outline-danger w-100 btn-download-invoice mb-75 waves-effect">Download
                                    PDF</a>
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
        $(document).ready(function () {
            $('#datatables').DataTable();
            $('#datatables1').DataTable();
            $('#datatables2').DataTable();
            $('#datatables3').DataTable();
            $('#datatables4').DataTable();
            $('#datatables5').DataTable();
        });
    </script>
@endsection
