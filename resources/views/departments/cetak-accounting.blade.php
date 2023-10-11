<!DOCTYPE html>
<html>
<head>
    <title>Data Karyawan Departments</title>
    <style>
        /* CSS untuk styling tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
            font-size: 15px;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        .vertical-center {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="vertical-center">
        <h4 class="text-center">Data Karyawan Department Accounting<br> PT. Sreeya Sewu Indonesia Tbk <br> Tahun 2023</h4>
        <table>
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Department</th>
                    <th>Email</th>
                    <!-- Tambahkan kolom lain sesuai kebutuhan Anda -->
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $data)
                    <tr>
                        <td>{{ $data->nik_karyawan }}</td>
                        <td>{{ $data->nama_karyawan }}</td>
                        <td>{{ $data->departments->name }}</td>
                        <td>{{ $data->email }}</td>
                        <!-- Tambahkan kolom lain sesuai kebutuhan Anda -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>