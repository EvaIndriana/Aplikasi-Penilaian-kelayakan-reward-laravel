@extends('layoutsVuexy.master')
@section('contentvuexy')
    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <li class="breadcrumb-item"><a href="{{ url('nilai_loyalitas') }}">Nilai Loyalitas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        Tambah nilai-loyalitas
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('penilaian_fuzzy.store') }}">
                            @csrf
                            <div class="row">


                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="karyawan_id">Nama Karyawan</label>
                                        <select class="form-select @error('karyawan_id') is-invalid @enderror" id="namaKaryawan" name="karyawan_id">
                                            <option value="">Nama Karyawan</option>
                                            @foreach ($karyawanBelumDinilai as $data)
                                                <option value="{{ $data->id }}">
                                                    {{ $data->nama_karyawan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('karyawan_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group" style="padding-top: 10px;">
                                        <label for="nik_karyawan">Nik Karyawan</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" value="{{ old('nik_karyawan', session('nik_karyawan')) }}"
                                                id="nikKaryawan"
                                                class="form-control @error('nik_karyawan') is-invalid @enderror"
                                                name="nik_karyawan" required>
                                            @error('nik_karyawan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group" style="padding-top: 10px;">
                                        <label for="nik_karyawan">Periode</label>
                                        <select class="form-select @error('tahun_input_reward') is-invalid @enderror" id="tahunInputReward" name="tahun_input_reward">

                                        </select>
                                        @error('tahun_input_reward')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group" style="padding-top: 10px;">
                                        <label for="status_ket_kinerja">Status Data Kinerja</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" value="{{ old('status_ket_kinerja', session('status_ket_kinerja')) }}"
                                                id="statusDataKinerja"
                                                class="form-control @error('status_ket_kinerja') is-invalid @enderror"
                                                name="status_ket_kinerja" required>
                                            @error('status_ket_kinerja')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group" style="padding-top: 10px;">
                                        <label for="status_ket_komunikasi">Status Data Komunikasi</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" value="{{ old('status_ket_komunikasi', session('status_ket_komunikasi')) }}"
                                                id="statusDataKomunikasi"
                                                class="form-control @error('status_ket_komunikasi') is-invalid @enderror"
                                                name="status_ket_komunikasi" required>
                                            @error('status_ket_komunikasi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group" style="padding-top: 10px;">
                                        <label for="status_ket_loyalitas">Status Data Loyalitas</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" value="{{ old('status_ket_loyalitas', session('status_ket_loyalitas')) }}"
                                                id="statusDataLoyalitas"
                                                class="form-control @error('status_ket_loyalitas') is-invalid @enderror"
                                                name="status_ket_loyalitas" required>
                                            @error('status_ket_loyalitas')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="col-4" style="padding-top: 10px;">
                                    <div class="form-group">
                                        <label for="nilai_kinerja_id">Kinerja</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                value="{{ old('nilai_kinerja_id', session('nilai_kinerja_id')) }}"
                                                id="nilaiKinerjaTotal"
                                                class="form-control @error('nilai_kinerja_id') is-invalid @enderror"
                                                name="nilai_kinerja_id" required>
                                            @error('nilai_kinerja_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4" style="padding-top: 10px;">
                                    <div class="form-group">
                                        <label for="nilai_komunikasi_id">Komunikasi</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                value="{{ old('nilai_komunikasi_id', session('nilai_komunikasi_id')) }}"
                                                id="nilaiKomunikasiTotal"
                                                class="form-control @error('nilai_komunikasi_id') is-invalid @enderror"
                                                name="nilai_komunikasi_id" required>
                                            @error('nilai_komunikasi_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4" style="padding-top: 10px;">
                                    <div class="form-group">
                                        <label for="nilai_loyalitas_id">Loyalitas</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                value="{{ old('nilai_loyalitas_id', session('nilai_loyalitas_id')) }}"
                                                id="nilaiLoyalitasTotal"
                                                class="form-control @error('nilai_loyalitas_id') is-invalid @enderror"
                                                name="nilai_loyalitas_id" required>
                                            @error('nilai_loyalitas_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="padding-top: 20px;">
                                    <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                                    <a href="{{ url('penilaian_fuzzy') }}" class="btn bg-gradient-secondary">Kembali</a>

                                    <!-- Tampilkan pesan kesalahan di bawah tombol -->
                                    @if(session('error'))
                                        <div class="alert alert-danger mt-3">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </body>

    </html>

    <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#namaKaryawan').change(function() {
                const karyawan_id = $(this).val();
                $.ajax({
                    url: '/get-karyawan-data/' + karyawan_id,
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            $('#nilaiKinerjaTotal').val(data.total_nilai_kinerja ? data.total_nilai_kinerja : 'Data tidak tersedia');
                            $('#nilaiKomunikasiTotal').val(data.total_nilai_komunikasi ? data.total_nilai_komunikasi : 'Data tidak tersedia');
                            $('#nilaiLoyalitasTotal').val(data.total_nilai_loyalitas ? data.total_nilai_loyalitas : 'Data tidak tersedia');
                            $('#nikKaryawan').val(data.nik_karyawan ? data.nik_karyawan : 'Data tidak tersedia');
                            // Tambahkan ini untuk mengisi input status_data
                            $('#statusDataKinerja').val(data.status_data_kinerja ? data.status_data_kinerja : 'Data tidak tersedia');
                            $('#statusDataKomunikasi').val(data.status_data_komunikasi ? data.status_data_komunikasi : 'Data tidak tersedia');
                            $('#statusDataLoyalitas').val(data.status_data_loyalitas ? data.status_data_loyalitas : 'Data tidak tersedia');
                        } else {
                            console.error('Data karyawan tidak ditemukan.');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Request failed: " + textStatus + ". Error: " + errorThrown);
                    }
                });
            });
        });

    </script>


    <!-- Masukkan script jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Masukkan script Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        // Inisialisasi select2
        $(document).ready(function() {
            $('#namaKaryawan').select2({
                placeholder: 'Pilih Karyawan',
            });
        });
    </script>


    <script>
        // Mendapatkan tahun saat ini
        var currentYear = new Date().getFullYear();

        // Mendapatkan tahun kebelakang (misalnya, 3 tahun ke belakang)
        var years = [];
        for (var i = currentYear; i >= currentYear - 3; i--) {
            years.push(i);
        }

        // Inisialisasi Select2 dengan pilihan tahun
        $('#tahunInputReward').select2({
            placeholder: 'Pilih Tahun',
            data: years.map(function(year) {
                return {
                    id: year,
                    text: year
                };
            })
        });
    </script>

@endsection
