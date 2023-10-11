<!-- resources/views/penilaian_fuzzy/export_pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penilaian Fuzzy (Layak)</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
        h4 {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #dee2e6;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f8f9fa;
        }
        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <h4 class="text-center">Data Karyawan <br> PT. Sreeya Sewu Indonesia Tbk <br> Tahun 2023</h4>
    <h4 style="text-align: center">Data Penilaian Fuzzy (Layak)</h4>
    <img src="{{ $item['image_path'] }}" alt="Image">
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Nama Karyawan</th>
                <th>Nilai Kinerja</th>
                <th>Nilai Komunikasi</th>
                <th>Nilai Loyalitas</th>
                <th>Status</th>
                <th>Defuzzyfikasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->karyawan->nama_karyawan }}</td>
                    <td>{{ $item->nilai_kinerja_id }}</td>
                    <td>{{ $item->nilai_komunikasi_id }}</td>
                    <td>{{ $item->nilai_loyalitas_id }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->defuzzyfikasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
