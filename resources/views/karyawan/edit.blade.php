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
                    <li class="breadcrumb-item"><a href="{{ url('karyawan') }}">Daftar Karyawan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        Tambah Pengguna
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('karyawan.update', $karyawan->id) }}">
                            @csrf
                            @method('PUT')
                            <section id="input-group-buttons">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Tambah Daftar Karyawan</h4>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                    Silakan masukkan data yang sesuai dengan identitas pengguna.
                                                </p>
                                                <div class="row">
                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label for="nama_karyawan">Nama Lengkap</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-user">
                                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                                                    </path>
                                                                    <circle cx="12" cy="7" r="4">
                                                                    </circle>
                                                                </svg>
                                                            </span>
                                                            <input type="text"
                                                                class="form-control form-control-lg @error('nama_karyawan') is-invalid @enderror"
                                                                name="nama_karyawan" id="nama_karyawan"
                                                                placeholder="Nama Lengkap"
                                                                value="{{ old('nama_karyawan', $karyawan->nama_karyawan) }}">
                                                            @error('nama_karyawan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label for="email">Email</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-mail">
                                                                    <path
                                                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                                    </path>
                                                                    <polyline points="22,6 12,13 2,6"></polyline>
                                                                </svg>
                                                            </span>
                                                            <input type="email"
                                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                                name="email" id="email" placeholder="email@gmail.com"
                                                                value="{{ old('email', $karyawan->email) }}">
                                                            @error('email')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6 mb-1">
                                                        <label class="form-label" for="departments_id">Departemen</label>
                                                        <div class="position-relative">
                                                            <select id="departments_id" name="departments_id"
                                                                class="select2 form-select select2-hidden-accessible @error('departments_id') is-invalid @enderror">
                                                                <option value="">Departemen</option>
                                                                @foreach ($departments as $data)
                                                                    <option value="{{ $data->id }}"
                                                                        {{ old('departments_id', $karyawan->departments_id) == $data->id ? 'selected' : '' }}>
                                                                        {{ $data->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('departments_id')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label for="nik_karyawan">Nik Karyawan</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-key">
                                                                    <path
                                                                        d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                            <input type="text"
                                                                class="form-control form-control-lg @error('nik_karyawan') is-invalid @enderror"
                                                                name="nik_karyawan" id="nik_karyawan"
                                                                value="{{ old('nik_karyawan', $karyawan->nik_karyawan) }}">
                                                            @error('nik_karyawan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-6">
                                                        <label class="form-label"
                                                            for="status_aktif_karyawan">status_pekerjaan
                                                            Pekerjaan</label>
                                                        <div class="position-relative">
                                                            <select name="status_aktif_karyawan"
                                                                id="status_aktif_karyawan" class="form-control">
                                                                <option value="1"
                                                                    {{ old('status_aktif_karyawan', $karyawan->status_aktif_karyawan) == '1' ? 'selected' : '' }}>
                                                                    Aktif
                                                                </option>
                                                                <option value="0"
                                                                    {{ old('status_aktif_karyawan', $karyawan->status_aktif_karyawan) == '0' ? 'selected' : '' }}>
                                                                    Non-Aktif</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Input tanggal_nonaktif yang akan ditampilkan ketika status Non-Aktif dipilih -->
                                                    <div class="form-group" id="tanggal_nonaktif_div" style="padding-top: 10px"
                                                        {{ $karyawan->status_aktif_karyawan == 0 ? '' : 'style=display:none;' }}>
                                                        <label for="tanggal_nonaktif">Tanggal Non-Aktif:</label>
                                                        <input type="date" name="tanggal_nonaktif"
                                                            id="tanggal_nonaktif" class="form-control"
                                                            value="{{ old('tanggal_nonaktif', $karyawan->tanggal_nonaktif) }}">
                                                    </div>


                                                    <div class="col-6" style="padding-top: 10px">
                                                        <label class="form-label" for="status_pekerjaan">Status Pekerjaan
                                                            Pekerjaan</label>
                                                        <div class="position-relative">
                                                            <select name="status_pekerjaan" id="status_pekerjaan"
                                                                class="form-control">
                                                                <option value="Aktif"
                                                                    {{ old('status_pekerjaan', $karyawan->status_pekerjaan) == 'Karyawan Kontrak' ? 'selected' : '' }}>
                                                                    Belum Menikah
                                                                </option>
                                                                <option value="Karyawan Tetap"
                                                                    {{ old('status_pekerjaan', $karyawan->status_pekerjaan) == 'Karyawan Tetap' ? 'selected' : '' }}>
                                                                    Karyawan Tetap</option>
                                                                <option value="Internship"
                                                                    {{ old('status_pekerjaan', $karyawan->status_pekerjaan) == 'Internship' ? 'selected' : '' }}>
                                                                    Internship
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label for="jenis_kelamin"
                                                            class="col-form-label text-md-right">Jenis Kelamin</label>
                                                        <div class="col-md-6">
                                                            <div class="form-check">
                                                                @if ($karyawan->jenis_kelamin)
                                                                    <input class="form-check-input" type="radio"
                                                                        name="jenis_kelamin" id="exampleRadios1"
                                                                        value="Laki-laki" checked>
                                                                @else
                                                                    <input class="form-check-input" type="radio"
                                                                        name="jenis_kelamin" id="exampleRadios1"
                                                                        value="Laki-laki">
                                                                @endif
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                    Laki-laki
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jenis_kelamin" id="exampleRadios2"
                                                                    value="Perempuan">
                                                                <label class="form-check-label" for="exampleRadios2">
                                                                    Perempuan
                                                                </label>
                                                            </div>
                                                            @error('jenis_kelamin')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 col-12 mb-1" style="padding-top:10px">
                                                        <label for="tempat_lahir">Tempat Lahir</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-map-pin">
                                                                    <path
                                                                        d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z">
                                                                    </path>
                                                                    <circle cx="12" cy="10" r="3">
                                                                    </circle>
                                                                </svg>
                                                            </span>
                                                            <input type="text"
                                                                class="form-control form-control-lg @error('tempat_lahir') is-invalid @enderror"
                                                                name="tempat_lahir" id="tempat_lahir"
                                                                value="{{ old('tempat_lahir', $karyawan->tempat_lahir) }}">
                                                            @error('tempat_lahir')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12 mb-1" style="padding-top:10px" <label
                                                        for="tanggal_lahir">Tanggal Lahir</label>
                                                        <div class="input-group">
                                                            <input type="date"
                                                                class="form-control form-control-lg @error('tanggal_lahir') is-invalid @enderror"
                                                                name="tanggal_lahir" id="tanggal_lahir"
                                                                value="{{ old('tanggal_lahir', $karyawan->tanggal_lahir) }}">
                                                            @error('tanggal_lahir')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label for="no_hp">No Handphone</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                    height="14" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-phone">
                                                                    <path
                                                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.70A2 2 0 0 1 22 16.92z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                            <input type="number"
                                                                class="form-control form-control-lg @error('no_hp') is-invalid @enderror"
                                                                name="no_hp" id="no_hp"
                                                                value="{{ old('no_hp', $karyawan->no_hp) }}">
                                                            @error('no_hp')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label class="form-label" for="pendidikan">Pendidikan</label>
                                                        <div class="position-relative">
                                                            <select name="pendidikan" id="pendidikan"
                                                                class="form-control">
                                                                <option value="SMK/SMA"
                                                                    {{ old('pendidikan', $karyawan->pendidikan) == 'SMK/SMA' ? 'selected' : '' }}>
                                                                    Belum Menikah
                                                                </option>
                                                                <option value="menikah"
                                                                    {{ old('pendidikan', $karyawan->pendidikan) == 'menikah' ? 'selected' : '' }}>
                                                                    Menikah</option>
                                                                <option value="cerai"
                                                                    {{ old('pendidikan', $karyawan->pendidikan) == 'cerai' ? 'selected' : '' }}>
                                                                    Cerai
                                                                </option>
                                                                <option value="duda"
                                                                    {{ old('pendidikan', $karyawan->pendidikan) == 'duda' ? 'selected' : '' }}>
                                                                    Duda
                                                                </option>
                                                                <option value="janda"
                                                                    {{ old('pendidikan', $karyawan->pendidikan) == 'janda' ? 'selected' : '' }}>
                                                                    Janda
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label class="form-label" for="agama">Agama</label>
                                                        <div class="position-relative">
                                                            <select name="agama" id="agama" class="form-control">
                                                                <option value="islam"
                                                                    {{ old('agama', $karyawan->agama) == 'islam' ? 'selected' : '' }}>
                                                                    Islam
                                                                </option>
                                                                <option value="kristen"
                                                                    {{ old('agama', $karyawan->agama) == 'kristen' ? 'selected' : '' }}>
                                                                    Kristen
                                                                </option>
                                                                <option value="katolik"
                                                                    {{ old('agama', $karyawan->agama) == 'katolik' ? 'selected' : '' }}>
                                                                    Katolik</option>
                                                                <option value="hindu"
                                                                    {{ old('agama', $karyawan->agama) == 'hindu' ? 'selected' : '' }}>
                                                                    Hindu
                                                                </option>
                                                                <option value="budha"
                                                                    {{ old('agama', $karyawan->agama) == 'budha' ? 'selected' : '' }}>
                                                                    Budha
                                                                </option>
                                                                <option value="konghucu"
                                                                    {{ old('agama', $karyawan->agama) == 'konghucu' ? 'selected' : '' }}>
                                                                    Konghucu
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <label class="form-label" for="status">Status</label>
                                                        <div class="position-relative">
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="SMK/SMA"
                                                                    {{ old('status', $karyawan->status) == 'SMK/SMA' ? 'selected' : '' }}>
                                                                    SMK/SMA
                                                                </option>
                                                                <option value="Diploma"
                                                                    {{ old('status', $karyawan->status) == 'Diploma' ? 'selected' : '' }}>
                                                                    Diploma</option>
                                                                <option value="Sarjana"
                                                                    {{ old('status', $karyawan->status) == 'Sarjana' ? 'selected' : '' }}>
                                                                    Sarjana
                                                                </option>
                                                                <option value="Magister"
                                                                    {{ old('status', $karyawan->status) == 'Magister' ? 'selected' : '' }}>
                                                                    Magister
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12" style="padding-top:20px">
                                                        <div class="form-group">
                                                            <label for="alamat">Alamat</label>
                                                            <textarea class="form-control" id="alamat" value="{{ old('alamat') }}" id="alamat"
                                                                class="form-control  @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat sesuai domisili"
                                                                required rows="3">{{ old('alamat', $karyawan->alamat) }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top:20px">
                                    <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                                    <a href="{{ url('karyawan') }}" class="btn bg-gradient-secondary">Kembali</a>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </body>

    </html>

    <script>
        // Fungsi yang akan dijalankan saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Mengambil elemen select dengan ID status_aktif_karyawan
            var statusAktifSelect = document.getElementById('status_aktif_karyawan');

            // Mengambil elemen input tanggal_nonaktif dengan ID tanggal_nonaktif
            var tanggalNonaktifInput = document.getElementById('tanggal_nonaktif_div');
            // Perhatikan perubahan ID di sini


            // Fungsi untuk menampilkan atau menyembunyikan input tanggal_nonaktif
            function toggleTanggalNonaktifInput() {
                if (statusAktifSelect.value === '0') {
                    tanggalNonaktifInput.style.display = 'inline'; // Tampilkan input tanggal_nonaktif
                } else {
                    tanggalNonaktifInput.style.display = 'none'; // Sembunyikan input tanggal_nonaktif
                }
            }

            // Panggil fungsi saat halaman dimuat untuk menentukan status awal input tanggal_nonaktif
            toggleTanggalNonaktifInput();

            // Tambahkan event listener untuk mendeteksi perubahan pada select status_aktif_karyawan
            statusAktifSelect.addEventListener('change', toggleTanggalNonaktifInput);
        });
    </script>
@endsection
