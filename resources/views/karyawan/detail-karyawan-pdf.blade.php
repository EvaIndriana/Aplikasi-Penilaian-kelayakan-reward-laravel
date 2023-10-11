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
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            background-color: #fff;
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
        <h6 class="text-center">Laporan Data Karyawan</h6>

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
                    <th>Tempat Lahir</th>
                    <td>{{ $karyawan->tempat_lahir}},{{ $karyawan->tanggal_lahir}} </td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $karyawan->alamat }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $karyawan->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>{{ $karyawan->agama }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $karyawan->status }}</td>
                </tr>




                <!-- Tambahkan informasi karyawan lain sesuai kebutuhan Anda -->
            </tbody>
        </table>
        @else
        <div class="alert alert-danger">
            Karyawan tidak ditemukan.
        </div>
        @endif
</body>
</html>
