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
                    <li class="breadcrumb-item"><a href="{{ url('indikator_kinerja') }}">Indikator Kinerja</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>

            <div class="container">
                <div class="card-group">
                    @foreach ($indikator_kinerja as $item)
                    <div class="card">
                        <h5 class="text-left" style="padding-left:30px; padding-top:20px">Variabel kinerja</h5>
                        <ul class="list-group list-group-flush" style="padding-top:30px; padding-left:30px">
                            <li class="list-group-item">
                                <H6>Indikator Variabel kinerja 1</H6>
                                <p class="card-text">{{ $item->indikator_kinerja_1 }}</p>
                            </li>
                            <li class="list-group-item">
                                <H6>Indikator Variabel kinerja 2</H6>
                                <p class="card-text">{{ $item->indikator_kinerja_2 }}</p>
                            </li>
                            <li class="list-group-item">
                                <H6>Indikator Variabel kinerja 3</H6>
                                <p class="card-text">{{ $item->indikator_kinerja_3 }}</p>
                            </li>
                            <div class="card-footer text-left">
                                @if (Auth::user()->role === 'Admin Aplikasi')
                                <a href="{{ route('indikator_kinerja.edit', $item->id) }}" class="btn  bg-gradient-success">Edit</a>
                                @endif
                                {{--  <a href="{{ route('indikator_kinerja.create', $item->id) }}" class="btn  bg-gradient-info">Add data</a>  --}}
                                {{--  <form action="{{ route('indikator_kinerja.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn  bg-gradient-danger">Delete</button>
                                </form>  --}}
                            </div>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>


            <div class="container">
                <div class="card-group">
                    @foreach ($indikator_komunikasi as $item)
                    <div class="card">
                        <h5 class="text-left" style="padding-left:30px; padding-top:20px">Variabel Komunikasi</h5>
                        <ul class="list-group list-group-flush" style="padding-top:30px; padding-left:30px">
                            <li class="list-group-item">
                                <H6>Indikator Variabel Komunikasi 1</H6>
                                <p class="card-text">{{ $item->indikator_komunikasi_1 }}</p>
                            </li>
                            <li class="list-group-item">
                                <H6>Indikator Variabel Komunikasi 2</H6>
                                <p class="card-text">{{ $item->indikator_komunikasi_2 }}</p>
                            </li>
                            <li class="list-group-item">
                                <H6>Indikator Variabel Komunikasi 3</H6>
                                <p class="card-text">{{ $item->indikator_komunikasi_3 }}</p>
                            </li>
                        </ul>
                        <div class="card-footer text-left">
                            @if (Auth::user()->role === 'Admin Aplikasi')
                            <a href="{{ route('indikator_komunikasi.edit', $item->id) }}" class="btn  bg-gradient-success">Edit</a>
                            @endif
                            {{--  <a href="{{ route('indikator_komunikasi.create', $item->id) }}" class="btn  bg-gradient-info">Add data</a>  --}}
                            {{--  <form action="{{ route('indikator_komunikasi.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn  bg-gradient-danger">Delete</button>
                            </form>  --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="container">
                <div class="card-group">
                    @foreach ($indikator_loyalitas as $item)
                    <div class="card">
                        <h5 class="text-left" style="padding-left:30px; padding-top:20px">Variabel Loyalitas</h5>
                        <ul class="list-group list-group-flush" style="padding-top:30px; padding-left:30px">
                            <li class="list-group-item">
                                <H6>Indikator Variabel loyalitas 1</H6>
                                <p class="card-text">{{ $item->indikator_loyalitas_1 }}</p>
                            </li>
                            <li class="list-group-item">
                                <H6>Indikator Variabel loyalitas 2</H6>
                                <p class="card-text">{{ $item->indikator_loyalitas_2 }}</p>
                            </li>
                            <li class="list-group-item">
                                <H6>Indikator Variabel loyalitas 3</H6>
                                <p class="card-text">{{ $item->indikator_loyalitas_3 }}</p>
                            </li>
                        </ul>
                        <div class="card-footer text-left">
                            @if (Auth::user()->role === 'Admin Aplikasi')
                            <a href="{{ route('indikator_loyalitas.edit', $item->id) }}" class="btn  bg-gradient-success">Edit</a>
                           @endif
                            {{--  <a href="{{ route('indikator_loyalitas.create', $item->id) }}" class="btn  bg-gradient-info">Add data</a>  --}}
                            {{--  <form action="{{ route('indikator_loyalitas.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn  bg-gradient-danger">Delete</button>
                            </form>  --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>



    </html>
@endsection
