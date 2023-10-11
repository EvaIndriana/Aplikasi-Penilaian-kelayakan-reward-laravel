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
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('users') }}">Daftar Pengguna</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $users->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <section id="input-group-buttons">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Edit Detail Pengguna</h4>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text">
                                                        Silakan masukkan data yang sesuai dengan identitas pengguna.
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-md-6 col-12 mb-1">
                                                            <label for="name">Nama Lengkap</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="14" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-user">
                                                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2">
                                                                        </path>
                                                                        <circle cx="12" cy="7"
                                                                            r="4"></circle>
                                                                    </svg>
                                                                </span>
                                                                <input type="text"
                                                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                                    name="name" id="name" placeholder="Nama Lengkap"
                                                                    value="{{ old('name', $users->name) }}">
                                                                @error('name')
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
                                                                    name="email" id="email"
                                                                    placeholder="email@gmail.com"
                                                                    value="{{ old('name', $users->email) }}">
                                                                @error('email')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12 mb-1">
                                                            <label for="password">Password</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                        height="14" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-lock">
                                                                        <rect x="3" y="11" width="18"
                                                                            height="11" rx="2" ry="2">
                                                                        </rect>
                                                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                                    </svg>
                                                                </span>
                                                                <input type="password"
                                                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                                    name="password" id="password"
                                                                    @if (!empty($users->password)) value="{{ old('password', $users->password) }}" @endif>
                                                                @error('password')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="password">Password Baru (Biarkan kosong jika
                                                                    tidak ingin
                                                                    mengubah)</label>
                                                                <div class="input-group input-group-merge">
                                                                    <span class="input-group-text"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="14" height="14"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-lock">
                                                                            <rect x="3" y="11"
                                                                                width="18" height="11"
                                                                                rx="2" ry="2"></rect>
                                                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                                        </svg></span>
                                                                    <input type="password" id="password" type="password"
                                                                        name="new_password"
                                                                        class="form-control @error('new_password') is-invalid @enderror">
                                                                    @error('new_password')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <label class="form-label" for="role">Role</label>
                                                            <div class="position-relative">
                                                                <select name="role" id="role"
                                                                    class="form-control">
                                                                    <option value="Admin Aplikasi"
                                                                        @if ($users->role === 'Admin Aplikasi') selected @endif>
                                                                        Admin Aplikasi</option>
                                                                    <option value="Admin Hrd"
                                                                        @if ($users->role === 'Admin Hrd') selected @endif>
                                                                        Admin Hrd</option>
                                                                    <option value="Pimpinan"
                                                                        @if ($users->role === 'Pimpinan') selected @endif>
                                                                        Pimpinan</option>
                                                                    <option value="Pimpinan"
                                                                        @if ($users->role === 'Pimpinan') selected @endif>
                                                                        Pimpinan</option>
                                                                    <option value="Kepala Dep.Hrd"
                                                                        @if ($users->role === 'Kepala De.Hrd') selected @endif>
                                                                        Kepala De.Hrd</option>
                                                                    <option value="Kepala Dep.Environment"
                                                                        @if ($users->role === 'Kepala Dep.Environment') selected @endif>
                                                                        Kepala Dep.Environment</option>
                                                                    <option value="Kepala Dep.Engineering"
                                                                        @if ($users->role === 'Kepala Dep.Engineering') selected @endif>
                                                                        Kepala Dep.Engineering</option>
                                                                    <option value="Kepala Dep.Accounting"
                                                                        @if ($users->role === 'Kepala Dep.Accounting') selected @endif>
                                                                        Kepala Dep.Accounting</option>
                                                                        <option value="Kepala Dep.Safety"
                                                                        @if ($users->role === 'Kepala Dep.Safety') selected @endif>
                                                                        Kepala Dep.Safety</option>
                                                                </select>
                                                            </div>
                                                            @error('role')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
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
                                                                    value="{{ old('no_hp', $users->no_hp) }}">
                                                                @error('no_hp')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
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
                                                                        <circle cx="12" cy="10"
                                                                            r="3"></circle>
                                                                    </svg>
                                                                </span>
                                                                <input type="text"
                                                                    class="form-control form-control-lg @error('tempat_lahir') is-invalid @enderror"
                                                                    name="tempat_lahir" id="tempat_lahir"
                                                                    value="{{ old('tempat_lahir', $users->tempat_lahir) }}">
                                                                @error('tempat_lahir')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <label class="form-label" for="status">Status</label>
                                                            <div class="position-relative">
                                                                <select name="status" id="status"
                                                                    class="form-control">
                                                                    <option value="belum-menikah"
                                                                        {{ old('status', $users->status) == 'belum-menikah' ? 'selected' : '' }}>
                                                                        Belum Menikah
                                                                    </option>
                                                                    <option value="menikah"
                                                                        {{ old('status', $users->status) == 'menikah' ? 'selected' : '' }}>
                                                                        Menikah</option>
                                                                    <option value="cerai"
                                                                        {{ old('status', $users->status) == 'cerai' ? 'selected' : '' }}>
                                                                        Cerai
                                                                    </option>
                                                                    <option value="duda"
                                                                        {{ old('status', $users->status) == 'duda' ? 'selected' : '' }}>
                                                                        Duda
                                                                    </option>
                                                                    <option value="janda"
                                                                        {{ old('status', $users->status) == 'janda' ? 'selected' : '' }}>
                                                                        Janda
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-6">
                                                            <label class="form-label" for="agama">Agama</label>
                                                            <div class="position-relative">
                                                                <select name="agama" id="agama"
                                                                    class="form-control">
                                                                    <option value="islam"
                                                                        {{ old('agama', $users->agama) == 'islam' ? 'selected' : '' }}>
                                                                        Islam
                                                                    </option>
                                                                    <option value="kristen"
                                                                        {{ old('agama', $users->agama) == 'kristen' ? 'selected' : '' }}>
                                                                        Kristen
                                                                    </option>
                                                                    <option value="katolik"
                                                                        {{ old('agama', $users->agama) == 'katolik' ? 'selected' : '' }}>
                                                                        Katolik</option>
                                                                    <option value="hindu"
                                                                        {{ old('agama', $users->agama) == 'hindu' ? 'selected' : '' }}>
                                                                        Hindu
                                                                    </option>
                                                                    <option value="budha"
                                                                        {{ old('agama', $users->agama) == 'budha' ? 'selected' : '' }}>
                                                                        Budha
                                                                    </option>
                                                                    <option value="konghucu"
                                                                        {{ old('agama', $users->agama) == 'konghucu' ? 'selected' : '' }}>
                                                                        Konghucu
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-12 mb-1">
                                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                                            <div class="input-group">
                                                                <input type="date"
                                                                    class="form-control form-control-lg @error('tanggal_lahir') is-invalid @enderror"
                                                                    name="tanggal_lahir" id="tanggal_lahir"
                                                                    value="{{ old('tanggal_lahir', $users->tanggal_lahir) }}">
                                                                @error('tanggal_lahir')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat</label>
                                                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                                                                    placeholder="Alamat sesuai domisili" required rows="3">{{ old('alamat', $users->alamat) }}</textarea>
                                                                @error('alamat')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label class="form-label" for="foto">Image</label>

                                                                @if ($users->foto)
                                                                    <div class="mb-3" style="padding-top: 10px">
                                                                        <img class="img-fluid"
                                                                            style="max-width: 150px; max-height: 150px"
                                                                            src="{{ asset('foto/' . $users->foto) }}"
                                                                            alt="User Image">
                                                                        <img class="img-preview img-fluid"
                                                                            id="image-preview"
                                                                            style="max-width: 150px; max-height: 150px">
                                                                    </div>
                                                                @endif
                                                                <input type="file" class="form-control" id="foto"
                                                                    name="foto" placeholder=""
                                                                    onchange="previewImage()">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding-top:20px">
                                        <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                                        <a href="{{ url('users') }}" class="btn bg-gradient-secondary">Kembali</a>
                                    </div>
                                </section>
                            </div>
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

    <!-- Select Role -->
    <script>
        // Inisialisasi Select2
        $(document).ready(function() {
            $('#select2-basic').select2();
        });
    </script>

    <!-- Select Agama -->
    <script>
        // Inisialisasi Select2
        $(document).ready(function() {
            $('#select-agama').select2();
        });
    </script>

    <!-- Select status pernikahan -->
    <script>
        // Inisialisasi Select2
        $(document).ready(function() {
            $('#select-status-pernikahan').select2();
        });
    </script>


    <!--select2-->
    <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/js/forms/select/select2.full.min.js') }}">
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
