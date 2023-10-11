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
                    <li class="breadcrumb-item"><a href="{{ url('thn_2023') }}">Penilaian 2023</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container" style="padding-top: 20px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Daftar Data Dipertimbangkan</h5>
                                <div>
                                    <a href="{{ url('/dipertimbangkan-pdf-2023') }}" class="btn btn-gradient-danger" target="_blank"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Cetak Pdf">
                                    <i class="fa-regular fa-file-pdf"></i>
                                </a>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="datatables">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>kinerja</th>
                                                <th>komunikasi</th>
                                                <th>loyalitas</th>
                                                <th>Status</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                     <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->karyawan->nama_karyawan }}</td>
                                                    <td>{{ $item->nilai_kinerja_id }}</td>
                                                    <td>{{ $item->nilai_komunikasi_id }}</td>
                                                    <td>{{ $item->nilai_loyalitas_id }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->defuzzyfikasi }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
