<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Karyawan</title>
    <!-- Tambahkan tautan ke CSS Bootstrap jika diperlukan -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Gaya untuk laporan karyawan */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .container {
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .table {
            border: none; /* Menghilangkan border pada tabel */
            padding-top: 20px;
        }
        .table td, .table th {
            border: none; /* Menghilangkan border pada sel tabel */
            padding: 8px;
        }
    </style>
</head>
<body>
        <h6 class="text-center">Laporan Data Karyawan dan Nilai Kinerja</h6>

        @if ($karyawan)
        <table class="table">
            <tbody>
                <tr>
                    <th>Nama Karyawan</th>
                    <td>{{ $karyawan->nama_karyawan }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>{{ $karyawan->nik_karyawan }}</td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td>{{ $karyawan->departments->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $karyawan->email }}</td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td>{{ $karyawan->no_hp }}</td>
                </tr>
                <tr>
                    <th>Status Pekerjaan</th>
                    <td>{{ $karyawan->status_pekerjaan }}</td>
                </tr>
                <!-- Tambahkan informasi karyawan lain sesuai kebutuhan Anda -->
            </tbody>
        </table>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Detail Nilai Kinerja
                        </div>
                        <div class="card-body">
                            <table class="table">

                                <tr>
                                    <th>Kualitas kerja - Kualitas kerja dapat dilihat dari ketepatan kerja, ketelitian, keterampilan,dan kebersihan dari kerja seseorang.</th>
                                    <td>{{ $nilai_kinerja->nilai_1 }}</td>
                                </tr>
                                <tr>
                                    <th>Sikap kerja - Sikap kerja terdiri dari sikap terhadap perusahaan,karyawan lain dan pekerjaan serta kerjasama.</th>
                                    <td>{{ $nilai_kinerja->nilai_2 }}</td>
                                </tr>
                                <tr>
                                    <th>Keandalan kerja - Keandalan kerja terdiri dari mengikuti intruksi, inisiatif, hati-hatian, kerajinan

                                    </th>
                                    <td>{{ $nilai_kinerja->nilai_3 }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $nilai_kinerja->status_data_kinerja}}</td>
                                </tr>
                                <tr>
                                    <th>Total Nilai</th>
                                    <td>{{ $nilai_kinerja->total_nilai_kinerja }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <div class="alert alert-danger">
            Karyawan tidak ditemukan.
        </div>
        @endif
</body>
</html>
