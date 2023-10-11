{{--  @extends('layouts.master')
@section('layouts.navbar')
@section('content')

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
                    <li class="breadcrumb-item"><a href="{{ url('indikator_komunikasi') }}">Daftar Indikator</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        Tambah Indikator
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('indikator_komunikasi.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Indikator</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror" required>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a
                                        href="{{ url('departments') }}"class="btn btn-outline-primary mt-1 me-1 waves-effect waves-float waves-light">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>

    </html>

@endsection  --}}
