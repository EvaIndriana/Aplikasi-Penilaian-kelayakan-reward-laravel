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
                    <li class="breadcrumb-item"><a href="{{ url('departments') }}">Department</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Daftar Departments</h5>
                                @if (Auth::user()->role === 'Admin Aplikasi')
                                <div>
                                    <a href="{{ url('departments/create') }}" class="btn btn-gradient-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Tambah Data">
                                        <i class="fa-solid fa-plus"></i></a>
                                </div><br>
                                @endauth



                                @if (session()->has('success'))
                                <div class="demo-spacing-0">
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <div class="alert-body">
                                            {{ session('success') }}
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped" id="datatables">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>Dibuat</th>
                                                <th>DIupdate</th>
                                                @if (Auth::user()->role === 'Admin Aplikasi')
                                                <th>Action</th>
                                                @endauth
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Isi tabel dengan data dari Laravel -->
                                            @if ($departments)
                                                @foreach ($departments as $item)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('d-M-Y') }}</td>
                                                        </td>
                                                        @if (Auth::user()->role === 'Admin Aplikasi')
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Contoh Button Group dengan Href">
                                                                <a href="{{ route('departments.edit', $item->id) }}" class="btn btn-gradient-success"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit Data"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-edit">
                                                                    <path
                                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                                    </path>
                                                                    <path
                                                                        d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                                    </path>
                                                                </svg></a>
                                                                <button type="button" class="btn btn-gradient-danger" data-toggle="modal" data-target="#confirmDelete{{ $item->id }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Hapus Data"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
                                                                {{--  <a href="{{ route('departments.show', $item->id) }}" class="btn btn-info">Lihat</a>  --}}
                                                            </div>

                                                            <!-- Modal Konfirmasi Hapus -->
                                                            <div class="modal fade" id="confirmDelete{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Apakah Anda yakin ingin menghapus department ini?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form method="POST" action="{{ route('departments.destroy', $item->id) }}">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="button" class="btn bg-gradient-secondary" data-dismiss="modal">Batal</button>
                                                                                <button type="submit" class="btn bg-gradient-danger">Hapus</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        @endauth
                                                    </tr>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ url('home') }}" class="btn btn-primary w-100 mb-75 waves-effect waves-float waves-light">Dashboard</a>
                                <a href="{{ url('/cetak-departments') }}" class="btn btn-outline-danger w-100 btn-download-invoice mb-75 waves-effect">Download PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection