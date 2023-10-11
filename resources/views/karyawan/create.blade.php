@extends('layoutsVuexy.master')
@section('contentvuexy')
    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Daftar Pengguna</title>
            <!--select-->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
            <link rel="stylesheet" type="text/css"
                href="{{ asset('vuexy/demo1/demo2/demo3/app-assets/vendors/css/forms/select/select2.min.css') }}">
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
                    <div class="card-body">
                        <form method="POST" action="{{ route('karyawan.store') }}">
                            @csrf
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
                                                                placeholder="Nama Lengkap">
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
                                                                name="email" id="email" placeholder="email@gmail.com">
                                                            @error('email')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-6 mb-1">
                                                        <label class="form-label" for="departments_id">Departments</label>
                                                        <select class="form-select" id="departments_id"
                                                            name="departments_id">
                                                            <option value="">Departemen</option>
                                                            @foreach ($departments as $data)
                                                                <option value="{{ $data->id }}">{{ $data->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('departments_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror

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
                                                                name="nik_karyawan" id="nik_karyawan">
                                                            @error('nik_karyawan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="select-status-keaktifan">Status Karyawan</label>
                                                        <select class="form-select" id="select-status-keaktifan" name="status_aktif_karyawan">
                                                            <option selected>Pilih Status </option>
                                                            <option value="1">Aktif</option>
                                                            <option value="0">Non-Aktif</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="select-status_pekerjaan">status_pekerjaan</label>
                                                        <select class="form-select" id="select-status_pekerjaan" name="status_pekerjaan">
                                                            <option selected>Pilih Status Pekerjaan</option>
                                                            <option value="karyawan kontrak">Karyawan Kontrak</option>
                                                            <option value="karyawan tetap">Karyawan Tetap</option>
                                                            <option value="Intership">Intership</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12 col-sm-6 mb-1">
                                                        <label class="form-label">Jenis Kelamin</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="jenis_kelamin" id="jenis_kelamin"
                                                                value="Laki-laki">
                                                            <label class="form-check-label" for="jenis_kelamin">
                                                                Laki-laki
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="jenis_kelamin" id="jenis_kelamin"
                                                                value="Perempuan">
                                                            <label class="form-check-label" for="jenis_kelamin">
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6 col-12 mb-1">
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
                                                                name="tempat_lahir" id="tempat_lahir">
                                                            @error('tempat_lahir')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12 mb-1">
                                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                                        <div class="input-group">
                                                            <input type="date"
                                                                class="form-control form-control-lg @error('tanggal_lahir') is-invalid @enderror"
                                                                name="tanggal_lahir" id="tanggal_lahir">
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
                                                                name="no_hp" id="no_hp">
                                                            @error('no_hp')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="select-pendidikan">Pendidikan</label>
                                                        <select class="form-select" id="select-pendidikan" name="pendidikan">
                                                            <option selected>Pilih Pendidikan</option>
                                                            <option value="SMK/SMA">SMK/SMA</option>
                                                            <option value="Diploma">Diploma</option>
                                                            <option value="Sarjana">Sarjana</option>
                                                            <option value="Magister">Magister</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="select-agama">Agama</label>
                                                        <select class="form-select" id="select-agama" name="agama">
                                                            <option selected>Pilih Agama</option>
                                                            <option value="Islam">Islam</option>
                                                            <option value="Kristen">Kristen</option>
                                                            <option value="Katolik">Katolik</option>
                                                            <option value="Hindu">Hindu</option>
                                                            <option value="Budha">Budha</option>
                                                            <option value="Konghucu">Konghucu</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 mb-1">
                                                        <label class="form-label" for="select-status-pernikahan">Status
                                                            Pernikahan</label>
                                                        <select class="form-select" id="select-status-pernikahan"
                                                            name="status" <option selected>Pilih Status</option>
                                                            <option selected>Pilih Status Pernikahan</option>
                                                            <option value="Belum Menikah">Belum Menikah</option>
                                                            <option value="Menikah">Menikah</option>
                                                            <option value="Cerai">Cerai</option>
                                                            <option value="Duda">Duda</option>
                                                            <option value="Janda">Janda</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="alamat">Alamat</label>
                                                            <textarea class="form-control" id="alamat" value="{{ old('alamat') }}" id="alamat"
                                                                class="form-control  @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat sesuai domisili"
                                                                required rows="3"></textarea>
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

    <!-- Masukkan script jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Masukkan script Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!--Select Departments-->
    <script>
        // Inisialisasi select2
        $(document).ready(function() {
            $('#departments_id').select2({
                placeholder: 'Pilih Departemen',
            });
        });
    </script>

    <!-- Select status pernikahan -->
    <script>
        // Inisialisasi Select2
        $(document).ready(function() {
            $('#select-status-pernikahan').select2();
        });
    </script>

    <!-- Select Agama -->
    <script>
        // Inisialisasi Select2
        $(document).ready(function() {
            $('#select-agama').select2();
        });
    </script>

    <!-- Select Status Keaktifan Karyawan -->
    <script>
        // Inisialisasi Select2
        $(document).ready(function() {
            $('#select-status-keaktifan').select2();
        });
    </script>

    <!-- Select status pekerjaan-->
    <script>
        // Inisialisasi Select2
        $(document).ready(function() {
            $('#select-status_pekerjaan').select2();
        });
    </script>

    <!-- Select pendidikan-->
    <script>
        // Inisialisasi Select2
        $(document).ready(function() {
            $('#select-pendidikan').select2();
        });
    </script>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
