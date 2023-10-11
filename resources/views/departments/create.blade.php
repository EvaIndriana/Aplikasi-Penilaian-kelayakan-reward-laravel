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
                    <li class="breadcrumb-item"><a href="{{ url('departments') }}">Daftar Departments</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('departments.store') }}">
                            @csrf
                            <section id="input-group-buttons">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Tambah Daftar Departments</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="name">Nama</label>
                                                        <div class="input-group">
                                                            <input type="text"
                                                                class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                                name="name" id="name"
                                                                placeholder="Nama Department">
                                                            @error('name')
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
                                <div class="form-group" style="padding-top:20px">
                                    <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                                    <a href="{{ url('departments') }}" class="btn bg-gradient-secondary">Kembali</a>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </body>

    </html>

@endsection
