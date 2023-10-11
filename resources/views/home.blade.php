@extends('layoutsVuexy.master')
@section('layoutsVuexy.navbarvuexy')
@section('contentvuexy')
    {{--  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>  --}}
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
                    <li class="breadcrumb-item active" aria-current="page">Data</li>

                </ol>
            </nav>
            @if (Auth::user()->role === 'Admin Aplikasi')
            @foreach ($users as $user)
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-primary p-50 m-0">
                                <div class="avatar-content">
                                    <div class="avatar bg-light-primary p-50 m-0">
                                        <div>
                                            @if ($user->foto)
                                                <img src="{{ url('foto') . '/' . $user->foto }}" alt="Avatar"
                                                    height="50" width="50">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="fw-bolder mt-1">{{ $user->name }}</h2>
                            <p class="card-text">{{ $user->role }}</p>
                        </div>
                        <br>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 236px; height: 239px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>

                </div>
            @endforeach
            @endauth


            @foreach ($jumlahKaryawanPerDepartemen as $departemen)
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bolder mb-75">{{ $departemen->total }} karyawan</h3>
                                <span>{{ $departemen->name }}</span>
                            </div>
                            <div class="avatar bg-light-danger p-50">
                                <span class="avatar-content">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-user avatar-icon">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            <!-- Grafik Balance menggunakan Chart.js -->
            <div class="col-12">
                <div class="card">
                    <div
                        class="card-header d-flex justify-content-between align-items-sm-center align-items-start flex-sm-row flex-column">
                        <div class="header-left">
                            <p class="card-subtitle text-muted mb-25">Reward</p>
                            <h4 class="card-title">Status Penilaian</h4><br>
                        </div>
                        {{--  <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                        </div>  --}}

                    </div>
                    <div class="card-body">
                        <!-- Container untuk grafik menggunakan Chart.js -->
                        <div style="height:600px; display: flex; flex-direction: column-reverse;">
                            <div style="flex: 1;">
                                <canvas id="balanceChart" class="horizontal-bar-chart-ex chartjs chartjs-render-monitor"
                                    data-height="400"></canvas>
                            </div>
                        </div>
                        <!-- Keterangan Data Horizontal -->
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px;">
                            <div style="display: flex; align-items: center;">
                                <div
                                    style="width: 20px; height: 20px; background-color: rgba(75, 192, 192, 0.2); margin-right: 5px;">
                                </div>
                                <p>Layak = {{ $jumlahStatusLayak }}</p>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div
                                    style="width: 20px; height: 20px; background-color: rgba(255, 99, 132, 0.2); margin-right: 5px;">
                                </div>
                                <p>Tidak Layak = {{ $jumlahStatusTidakLayak }}</p>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <div
                                    style="width: 20px; height: 20px; background-color: rgba(255, 206, 86, 0.2); margin-right: 5px;">
                                </div>
                                <p>Dipertimbangkan = {{ $jumlahStatusDipertimbangkan }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>




        </body>

    </html>

    <!-- Skrip Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('balanceChart').getContext('2d');
            var balanceChart = new Chart(ctx, {
                type: 'bar', // Ganti dengan jenis grafik yang sesuai
                data: {
                    labels: ['Layak', 'Tidak Layak', 'Dipertimbangkan'],
                    datasets: [{
                        label: 'Jumlah',
                        data: [{{ $jumlahStatusLayak }}, {{ $jumlahStatusTidakLayak }},
                            {{ $jumlahStatusDipertimbangkan }}
                        ],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: false, // Ubah menjadi false agar dimulai dari nilai 1
                            stepSize: 1, // Menentukan langkah nilai pada sumbu y
                            max: 25 // Menentukan nilai maksimal pada sumbu y
                        }
                    }
                }
            });
        });
    </script>


@endsection
