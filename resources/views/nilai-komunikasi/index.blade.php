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
                    <li class="breadcrumb-item"><a href="{{ url('nilai_komunikasi') }}">Nilai komunikasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            {{--  <div class="container">
                <div class="card-group">
                    @foreach ($indikator_komunikasi as $item)
                        <div class="card">
                            <h5 class="text-left" style="padding-left:30px; padding-top:20px">Variabel komunikasi</h5>
                            <ul class="list-group list-group-flush" style="padding-top:30px; padding-left:30px">
                                <li class="list-group-item">
                                    <H6>Indikator komunikasi 1</H6>
                                    <p class="card-text">{{ $item->indikator_komunikasi_1 }}</p>
                                </li>
                                <li class="list-group-item">
                                    <H6>Indikator komunikasi 2</H6>
                                    <p class="card-text">{{ $item->indikator_komunikasi_2 }}</p>
                                </li>
                                <li class="list-group-item">
                                    <H6>Indikator komunikasi 3</H6>
                                    <p class="card-text">{{ $item->indikator_komunikasi_3 }}</p>
                                </li>
                            </ul>
                            <div class="card-footer text-left">
                                @if (Request::is('indikator_komunikasi'))
                                    <a href="{{ route('indikator_komunikasi.edit', $item->id) }}"
                                        class="btn  bg-gradient-success">Edit</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>  --}}


            <div class="container" style="padding-top: 20px">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Daftar Nilai komunikasi</h5>
                                @if (Auth::user()->role === 'Admin Hrd')
                                    <div>
                                        <a href="{{ url('nilai_komunikasi/create') }}" class="btn btn-gradient-primary"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-bs-original-title="Tambah Data"><i class="fa-solid fa-plus"></i></a>
                                    </div><br>
                                @endauth
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
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="datatables">
                                            <thead>
                                                <tr>
                                                    {{--  <th class="text-center">No</th>  --}}
                                                    <th>Nama</th>
                                                    <th>Dep</th>
                                                    <th>Nilai 1</th>
                                                    <th>Nilai 2</th>
                                                    <th>Nilai 3</th>
                                                    <th>Hasil Nilai</th>
                                                    <th>Status Data</th>
                                                    @if (in_array(Auth::user()->role, [
                                                            'Admin Hrd',
                                                            'Kepala Dep.Hrd',
                                                            'Kepala Dep.Environment',
                                                            'Kepala Dep.Engineering',
                                                            'Kepala Dep.Accounting',
                                                            'Kepala Dep.Safety',
                                                        ]))
                                                        <th>Ket</th>
                                                    @endif
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Isi tabel dengan data dari Laravel -->
                                                @forelse ($nilai_komunikasi as $item)
                                                    <tr data-id="{{ $item->id }}">
                                                        <td>{{ $item->karyawan->nama_karyawan }}</td>
                                                        <td>{{ $item->departments->name }}</td>
                                                        <td>{{ $item->nilai_1 }}</td>
                                                        <td>{{ $item->nilai_2 }}</td>
                                                        <td>{{ $item->nilai_3 }}</td>
                                                        <td>{{ $item->total_nilai_komunikasi }}</td>
                                                        <td>
                                                            <span class="badge badge-light-warning me-1">
                                                                {{ $item->status_data_komunikasi }}
                                                            </span>
                                                        </td>
                                                        @if ($item->status_data_komunikasi == 'Revisi')
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-danger waves-effect waves-float waves-light"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#keterangancatatanRevisiModal{{ $item->id }}">
                                                                    Show
                                                                </button>
                                                            </td>
                                                        @elseif ($item->status_data_komunikasi == 'approved')
                                                            <td>  <button type="button"
                                                                class="btn btn-warning waves-effect waves-float waves-light">
                                                                Sesuai
                                                            </button></td>
                                                        @elseif (
                                                            ($item->status_data_komunikasi != 'approved' && Auth::user()->role == 'Admin Hrd') ||
                                                                Auth::user()->role == 'Kepala Dep.Hrd' ||
                                                                Auth::user()->role == 'Kepala Dep.Environment' ||
                                                                Auth::user()->role == 'Kepala Dep.Engineering' ||
                                                                Auth::user()->role == 'Kepala Dep.Accounting' ||
                                                                Auth::user()->role == 'Kepala Dep.Safety')
                                                            <td></td>
                                                        @endif
                                                        <td>
                                                            @if ($item->status_data_komunikasi === 'pending' && in_array(Auth::user()->role, [
                                                                'Kepala Dep.Hrd',
                                                                'Kepala Dep.Environment',
                                                                'Kepala Dep.Engineering',
                                                                'Kepala Dep.Accounting',
                                                                'Kepala Dep.Safety',
                                                                // Tambahkan 'Admin Hrd' ke sini
                                                            ]))
                                                                <form method="POST" action="{{ route('nilai_komunikasi.approve', ['id' => $item->id]) }}">
                                                                    @csrf
                                                                    <button type="submit" name="approval" value="sesuai" class="btn btn-success">Sesuai</button>
                                                                </form>
                                                                <button type="button" class="btn btn-danger waves-effect waves-float waves-light"
                                                                    data-toggle="modal" data-target="#catatanRevisiModal{{ $item->id }}">Tidak Sesuai</button>
                                                            @endif

                                                            @if ($item->status_data_komunikasi === 'Revisi' && Auth::user()->role === 'Admin Hrd')
                                                                <a href="{{ route('nilai_komunikasi.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                                            @endif

                                                            @if (in_array(Auth::user()->role, [
                                                                'Admin Hrd',
                                                                'Kepala Dep.Hrd',
                                                                'Kepala Dep.Environment',
                                                                'Kepala Dep.Engineering',
                                                                'Kepala Dep.Accounting',
                                                                'Kepala Dep.Safety',
                                                            ]))
                                                            <a href="{{ route('nilai_komunikasi.show', $item->id) }}"
                                                                class="btn btn-gradient-info" data-bs-toggle="tooltip"
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
                                                            @endif

                                                            @if (Auth::user()->role === 'Admin Hrd')
                                                            <button type="button" class="btn btn-gradient-danger"
                                                            data-toggle="modal"
                                                            data-target="#confirmDelete{{ $item->id }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
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
                                                            @endif
                                                        </td>
                                                    </tr>
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
                                                                        action="{{ route('nilai_komunikasi.destroy', $item->id) }}">
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
                                                    <!-- Modal Catatan Revisi -->
                                                    <div class="modal fade"
                                                        id="catatanRevisiModal{{ $item->id }}" tabindex="-1"
                                                        role="dialog"
                                                        aria-labelledby="catatanRevisiModalLabel{{ $item->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="catatanRevisiModalLabel{{ $item->id }}">
                                                                        Catatan Revisi</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST"
                                                                    action="{{ route('nilai_komunikasi.revisi', ['id' => $item->id]) }}">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="catatan_revisi">Masukkan
                                                                                Catatan Revisi:</label>
                                                                            <textarea class="form-control" id="catatan_revisi{{ $item->id }}" name="catatan_revisi" rows="4"
                                                                                required></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Simpan
                                                                            Revisi</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal tampilan Catatan Revisi -->
                                                    <div class="modal fade"
                                                        id="keterangancatatanRevisiModal{{ $item->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="keterangancatatanRevisiModal{{ $item->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="keterangancatatanRevisiModal{{ $item->id }}">
                                                                        Catatan Revisi</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" id="catatan_revisi" name="catatan_revisi" rows="2" required>{{ $item->catatan_revisi }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ url('nilai_komunikasi') }}"
                                                                        class="btn bg-gradient-secondary">Kembali</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="10">Tidak ada data.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Tambahkan script DataTables di sini -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable();
    });
</script>

<script>
    // Fungsi untuk menampilkan catatan revisi
    function tampilkanCatatanRevisi(id) {
        var catatanRevisiCell = document.querySelector('#catatanRevisi' + id);
        catatanRevisiCell.style.display = 'table-cell';
    }

    // Fungsi untuk menyembunyikan catatan revisi
    function sembunyikanCatatanRevisi(id) {
        var catatanRevisiCell = document.querySelector('#catatanRevisi' + id);
        catatanRevisiCell.style.display = 'none';
    }

    // Mendengarkan klik pada baris tabel
    var tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(function(row) {
        row.addEventListener('click', function() {
            var id = this.dataset.id;
            tampilkanCatatanRevisi(id);
        });
    });
</script>

@endsection
