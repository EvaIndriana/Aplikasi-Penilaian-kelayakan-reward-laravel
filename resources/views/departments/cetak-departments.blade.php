<!DOCTYPE html>
<html>
<head>
    <title>Data Departments</title>
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
        <h4 class="text-center">Data Daftar Departments<br> PT. Sreeya Sewu Indonesia Tbk <br> Tahun 2023</h4>
        <table>
            <thead>
                <tr>
                    <th>Nama Departments</th>
                    <!-- Tambahkan kolom lain sesuai kebutuhan Anda -->
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <!-- Tambahkan kolom lain sesuai kebutuhan Anda -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
