<!DOCTYPE html>
<html>
<head>
    <title>Laporan Hafalan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #000;
            padding: 5px;
        }
        th {
            background: #ddd;
        }
    </style>
</head>
<body>

    <h3 style="text-align:center">Laporan Hafalan Siswa</h3>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Surah</th>
                <th>Ayat</th>
                <th>Juz</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hafalan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->siswa->user->name }}</td>
                <td>{{ $item->siswa->kelas }}</td>
                <td>{{ $item->surah }}</td>
                <td>{{ $item->ayat }}</td>
                <td>{{ $item->juz }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
