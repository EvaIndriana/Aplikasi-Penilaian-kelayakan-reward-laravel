@extends('layoutsVuexy.master')
@section('contentvuexy')

    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Penilaian Indikator</title>
            <!--select-->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
            <link rel="stylesheet" type="text/css"
                href="{{ asset('vuexy/demo1/demo2/demo3/app-assets/vendors/css/forms/select/select2.min.css') }}">
        </head>

        <body>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('nilai_komunikasi') }}">Nilai Komunikasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('nilai_komunikasi.store') }}">
                            @csrf
                            <section id="input-group-buttons">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Penilaian Kinerja</h4>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                    Silakan masukkan penilaian untuk karyawan. Penilaian diberikan dengan range 1-100
                                                </p>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6 mb-1">
                                                        <label class="form-label" for="karyawan_id">Nama Karyawan</label>
                                                        <select class="form-select" id="karyawan_id"
                                                            name="karyawan_id">
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

                                                    <div class="col-6" style="padding-top:10px">
                                                        <div class="form-group">
                                                            <label for="nik_karyawan"> Nik Karyawan</label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="text" value="{{ old('nik_karyawan', session('nik_karyawan')) }}"
                                                                    id="nikKaryawan"
                                                                    class="form-control  @error('nik_karyawan') is-invalid @enderror"
                                                                    name="nik_karyawan" required disabled>
                                                                @error('nik_karyawan')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                        <div class="col-9">
                                                            <div class="mb-2">
                                                                <label for="note" class="form-label fw-bold">Indikator 1:</label>
                                                                <textarea class="form-control" rows="2" id="note" disabled> Persepsi - Tindakan yang terjadi di dalam diri seorang individu, mulai dari menerima dorongan hingga individu tersebut menyadari dan memahami sehingga dapat mengenali dirinya sendiri dan lingkungan sekitarnya.</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="nilai_1">Nilai </label>
                                                                <div class="input-group input-group-merge">
                                                                    <input type="number" value="{{ old('nilai_1') }}" id="nilai_1"
                                                                        class="form-control @error('nilai_1') is-invalid @enderror"
                                                                        name="nilai_1" placeholder="0- 100" >
                                                                    @error('nilai_1')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-9">
                                                            <div class="mb-2">
                                                                <label for="note" class="form-label fw-bold">Indikator 2:</label>
                                                                <textarea class="form-control" rows="2" id="note" disabled>Kredibilitas - Suatu situasi / kondisi yang dapat dipercaya dan dibuktikan.
                                                                </textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="nilai_2">Nilai </label>
                                                                <div class="input-group input-group-merge">
                                                                    <input type="number" value="{{ old('nilai_2') }}" id="nilai_2"
                                                                        class="form-control @error('nilai_2') is-invalid @enderror"
                                                                        name="nilai_2" placeholder="0 - 100" >
                                                                    @error('nilai_2')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-9">
                                                            <div class="mb-2">
                                                                <label for="note" class="form-label fw-bold">Indikator 3:</label>
                                                                <textarea class="form-control" rows="2" id="note" disabled>Ketepatan - Kemampuan seseorang untuk mengarahkan sesuatu keserangan berdasarkan tujuannya.
                                                                </textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="nilai_3">Nilai </label>
                                                                <div class="input-group input-group-merge">
                                                                    <input type="number" value="{{ old('nilai_3') }}" id="nilai_3"
                                                                        class="form-control @error('nilai_3') is-invalid @enderror"
                                                                        name="nilai_3" placeholder="0 - 100" >
                                                                    @error('nilai_3')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="padding-top:20px">
                                    <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                                    <a href="{{ url('nilai_komunikasi') }}" class="btn bg-gradient-secondary">Kembali</a>
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
    <script>
        // Inisialisasi select2
        $(document).ready(function() {
            $('#karyawan_id').select2({
                placeholder: 'Pilih Karyawan',
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#karyawan_id').change(function() {
                const karyawan_id = $(this).val();
                $.ajax({
                    url: '/get-karyawan-data/' + karyawan_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data) {
                            $('#nikKaryawan').val(data.nik_karyawan ? data.nik_karyawan :
                                'Data tidak tersedia');
                        } else {
                            console.error('Data karyawan tidak ditemukan.');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("Request failed: " + textStatus + ". Error: " +
                            errorThrown);
                    }
                });
            });
        });
    </script>

@endsection
