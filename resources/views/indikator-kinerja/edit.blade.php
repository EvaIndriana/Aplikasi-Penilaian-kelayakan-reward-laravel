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
                    <li class="breadcrumb-item"><a href="{{ url('indikator_kinerja') }}">Indikator kinerja</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        Edit Indikator
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('indikator_kinerja.update', $indikator_kinerja->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="indikator_kinerja_1">Indikator 1</label>
                                        <input type="text" name="indikator_kinerja_1" value="{{ old('indikator_kinerja_1', $indikator_kinerja->indikator_kinerja_1) }}"
                                            class="form-control @error('indikator_kinerja_1') is-invalid @enderror" required>
                                        @error('indikator_kinerja_1')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="indikator_kinerja_2">Indikator 2</label>
                                        <input type="text" name="indikator_kinerja_2" value="{{ old('indikator_kinerja_2', $indikator_kinerja->indikator_kinerja_2) }}"
                                            class="form-control @error('indikator_kinerja_2') is-invalid @enderror" required>
                                        @error('indikator_kinerja_2')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="indikator_kinerja_3">Indikator 3</label>
                                        <input type="text" name="indikator_kinerja_3" value="{{ old('indikator_kinerja_3', $indikator_kinerja->indikator_kinerja_3) }}"
                                            class="form-control @error('indikator_kinerja_3') is-invalid @enderror" required>
                                        @error('indikator_kinerja_3')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn  bg-gradient-primary mt-1 me-1 waves-effect waves-float waves-light">Simpan</button>
                                    <a
                                        href="{{ url('indikator_kinerja') }}"class="btn  bg-gradient-secondary mt-1 me-1 waves-effect waves-float waves-light">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

    </html>

@endsection
