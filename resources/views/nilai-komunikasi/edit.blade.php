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
                    {{--  <li class="breadcrumb-item"><a href="{{ url('nilai_komunikasi') }}">Nilai Komunikasi</a></li>  --}}
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('nilai_komunikasi.update', $nilai_komunikasi->id) }}">
                            @csrf
                            @method('PUT')
                            <section id="input-group-buttons">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Penilaian Komunikasi</h4>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                   Silakan masukkan penilaian untuk karyawan. Penilaian diberikan dengan range 1-100
                                                </p>
                                                <div class="row">
                                                <div class="col-md-6 col-12 mb-1">
                                                    <label for="karyawan_id">Nama </label>
                                                    <div class="input-group">
                                                        <input type="text"
                                                            class="form-control form-control-lg @error('karyawan_id') is-invalid @enderror"
                                                            name="karyawan_id" id="karyawan_id" placeholder="karyawan_id@gmail.com"
                                                            value="{{ old('karyawan_id',$nama_karyawan) }}" disabled>
                                                        @error('karyawan_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                    <div class="col-9">
                                                        <div class="mb-2">
                                                            <label for="note" class="form-label fw-bold">Indikator 1:</label>
                                                            <textarea class="form-control" rows="2" id="note" disabled> Kualitas kerja - Kualitas kerja dapat dilihat dari ketepatan kerja, ketelitian, keterampilan,dan kebersihan dari kerja seseorang.</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="nilai_1">Nilai </label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="number" value="{{ old('nilai_1',$nilai_komunikasi->nilai_1) }}" id="nilai_1"
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
                                                            <textarea class="form-control" rows="2" id="note" disabled>Sikap kerja - Sikap kerja terdiri dari sikap terhadap perusahaan,karyawan lain dan pekerjaan serta kerjasama.</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="nilai_2">Nilai </label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="number" value="{{ old('nilai_1',$nilai_komunikasi->nilai_2) }}" id="nilai_2"
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
                                                            <textarea class="form-control" rows="2" id="note" disabled> Keandalan kerja - Keandalan kerja terdiri dari mengikuti intruksi, inisiatif, hati-hatian, kerajinan</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label for="nilai_3">Nilai </label>
                                                            <div class="input-group input-group-merge">
                                                                <input type="number" value="{{ old('nilai_1',$nilai_komunikasi->nilai_3) }}" id="nilai_3"
                                                                    class="form-control @error('nilai_3') is-invalid @enderror"
                                                                    name="nilai_3" placeholder="0- 100" >
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

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Masukkan script jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Masukkan script Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

@endsection
