@extends('layouts.master')
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
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>

            {{--  @if (Auth::user()->role === 'Admin Aplikasi' )  --}}
            <div class="row" style="padding-top: 20px">
                @foreach ($users as $user)
                    <div class="col-md-4">
                        <div class="card mb-3" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <div class="card-body">
                                <table style="border-collapse: collapse;">
                                    <tr>
                                        <td><strong>Nama:</strong></td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Role:</strong></td>
                                        <td>{{ $user->role }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            {{--  @endauth  --}}


            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="pl-4 ">Nama Departemen</th>
                                                    <th class="text-right pr-4 ">Jumlah Karyawan</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($jumlahKaryawanPerDepartemen as $departemen)
                                                    <tr>
                                                        <td class="pl-4 ">{{ $departemen->name }}</td>
                                                        <td class="text-right pr-4 ">{{ $departemen->total }} karyawan</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card">
                                        <form method="POST" action="{{ route('cetak-laporan-karyawan') }}">
                                            @csrf
                                            <label for="department_id">Pilih Departemen:</label>
                                            <select name="department_id" id="department_id">
                                                <!-- Tambahkan pilihan departemen sesuai data yang Anda miliki -->
                                                <option value="1">Departemen 1</option>
                                                <option value="2">Departemen 2</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <p class="">Show Departemen Karyawan</p>
                                <!-- Button Group -->
                                <div class="btn-group align-center" role="group" aria-label="Button Group">
                                    <a href="{{ url('show-departements') }}" class="btn bg-gradient-primary">Show</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </body>

    </html>
@endsection
