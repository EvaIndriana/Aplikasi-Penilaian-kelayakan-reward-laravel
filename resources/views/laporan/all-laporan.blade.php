@extends('layoutsVuexy.master')
@section('contentvuexy')


    <!DOCTYPE html>
    <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Daftar Karyawan</title>
        </head>

        <body>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('karyawan') }}">Karyawan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <div class="col-lg-6 col-12 mb-1 mb-lg-0" style="padding-top: 20px">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ url('tidak-layak') }}" class="btn btn-primary waves-effect waves-float waves-light">Tidak Layak</a>
                    <button type="button" class="btn btn-primary waves-effect waves-float waves-light">Tidak Layak</button>
                    <button type="button" class="btn btn-primary waves-effect waves-float waves-light">Dipertimbangkan</button>
                    <button type="button" class="btn btn-primary waves-effect waves-float waves-light">Layak</button>
                </div>
            </div><br>
            <!-- Grafik Balance menggunakan Chart.js -->
            <div class="col-12" style="padding-top: 20px">
                <div class="card" style="padding-top: 20px" >
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

        <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            new DataTable('#datatables');
        </script>

    </html>
@endsection
