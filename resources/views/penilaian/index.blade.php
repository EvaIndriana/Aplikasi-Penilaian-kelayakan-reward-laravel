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
                    <li class="breadcrumb-item"><a href="{{ url('nilai_kinerja') }}">Penilaian Kinerja</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('nilai_komunikasi') }}">Penilaian Komunikasi</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('nilai_loyalitas') }}">Penilaian Loyalitas</a></li>
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
                                    <a href="{{ url('penilaian_fuzzy/create') }}" class="btn bg-gradient-primary"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Tambah Data"><i class="fa-solid fa-plus"></i></a>

                                        <div class="btn-group">
                                            <button class="btn btn-gradient-warning dropdown-toggle" type="button" id="dropdownMenuButton101" data-bs-toggle="dropdown" aria-expanded="false">
                                                Tahun
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton101">
                                                <a class="dropdown-item" href="{{ url('thn_2021') }}">2021</a>
                                                <a class="dropdown-item" href="{{ url('thn_2022') }}">2022</a>
                                                <a class="dropdown-item" href="{{ url('thn_2023') }}">2023</a>
                                            </div>
                                        </div>

                                </div>
                                <br>
                                @if (session()->has('success'))
                                <div class="demo-spacing-0">
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <div class="alert-body">
                                            {{ session('success') }}
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                                <div class="table-responsive">
                                    <table class="table table-striped" id="datatables">
                                        <thead>
                                            <tr>
                                                {{--  <th class="text-center">No</th>  --}}
                                                <th>Nama</th>
                                                <th>dibuat</th>
                                                <th>kinerja</th>
                                                <th>komunikasi</th>
                                                <th>loyalitas</th>
                                                <th>Status</th>
                                                <th>Nilai</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Isi tabel dengan data dari Laravel -->
                                            @if ($penilaian_fuzzy)
                                                @foreach ($penilaian_fuzzy as $item)
                                                @if ($item->tahun_input_reward == 2023)
                                                <tr>
                                                        {{--  <td class="text-center">{{ $loop->iteration }}</td>  --}}
                                                        <td>{{ $item->karyawan->nama_karyawan }}</td>
                                                       <td>{{ $item->tahun_input_reward}}</td>
                                                        <td>{{ $item->nilai_kinerja_id }}</td>
                                                        <td>{{ $item->nilai_komunikasi_id }}</td>
                                                        <td>{{ $item->nilai_loyalitas_id }}</td>
                                                        <td >{{ $item->status }}</td>
                                                        <td>{{ $item->defuzzyfikasi }}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Contoh Button Group dengan Href">
                                                                {{--  <a href="{{ route('nilai_loyalitas.edit', $item->id) }}" class="btn bg-gradient-success">Edit</a>  --}}
                                                                <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#confirmDelete{{ $item->id }}"  data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="" data-bs-original-title="Hapus Data">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-trash-2">
                                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                                        <path
                                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                        </path>
                                                                        <line x1="10" y1="11" x2="10"
                                                                            y2="17"></line>
                                                                        <line x1="14" y1="11" x2="14"
                                                                            y2="17"></line>
                                                                    </svg></button>
                                                                <a href="{{ route('penilaian_fuzzy.show', $item->id) }}"  class="btn btn-gradient-info" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" title=""
                                                                    data-bs-original-title="Lihat Data"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="20"
                                                                        height="20" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-eye">
                                                                        <path
                                                                            d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                                        </path>
                                                                        <circle cx="12" cy="12"
                                                                            r="3"></circle>
                                                                    </svg></a>
                                                            </div>

                                                            <!-- Modal Konfirmasi Hapus -->
                                                            <div class="modal fade" id="confirmDelete{{ $item->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Konfirmasi Hapus</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Apakah Anda yakin ingin menghapus data ini?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form method="POST"
                                                                                action="{{ route('penilaian_fuzzy.destroy', $item->id) }}">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="button"
                                                                                    class="btn bg-gradient-secondary"
                                                                                    data-dismiss="modal">Batal</button>
                                                                                <button type="submit"
                                                                                    class="btn bg-gradient-danger">Hapus</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </tbody>

                                    </table>
                                    <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
                                    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" type="text/javascript"></script>
                                    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
                                    <script type="text/javascript">
                                        new DataTable('#datatables');
                                    </script>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </body>

    </html>
@endsection
