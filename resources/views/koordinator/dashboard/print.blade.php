<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Report PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <h2>Hasil Penilaian Rekrutmen</h2>
    <table>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">Kelas</th>
                <th rowspan="2">Minatan</th>
                <th colspan="4">Penilaian</th>
                <th colspan="2">Wawancara</th>
                <th rowspan="2">Nilai Akhir</th>
                <th rowspan="2">Hasil Akhir</th>
            </tr>
            <tr>
                <th>Psikotest</th>
                <th>Umum</th>
                <th>Minatan</th>
                <th>Praktek</th>
                <th>Asisten</th>
                <th>Dosen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $registration)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $registration->name }}</td>
                    <td>{{ $registration->class }} - {{ $registration->period }}</td>
                    <td>{{ $registration->course->name ?? '-' }}</td>
                    <td>{{ $registration->test->testDetail->psikotest ?? '-' }}</td>
                    <td>{{ $registration->test->testDetail->umum ?? '-' }}</td>
                    <td>{{ $registration->test->testDetail->minatan ?? '-' }}</td>
                    <td>{{ $registration->test->testDetail->praktek ?? '-' }}</td>
                    <td>{{ $registration->test->wawancaraAsisten ?? '-' }}</td>
                    <td>{{ $registration->test->wawancaraDosen ?? '-' }}</td>
                    <td>{{ $registration->test->result->finalScore ?? '-' }}</td>
                    <td>{{ $registration->test->result->result ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="page-break"></div>

    <h2>Total Nilai Wawancara asisten</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Minatan</th>
                <th>Kemampuan Mengajar</th>
                <th>Pengenalan Diri dan Motivasi</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $registration)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $registration->name }}</td>
                    <td>{{ $registration->class }} - {{ $registration->period }}</td>
                    <td>{{ $registration->course->name ?? '-' }}</td>
                    <td>{{ $registration->test->testDetail->mengajar ?? '-' }}</td>
                    <td>{{ $registration->test->testDetail->pengenalanDiri ?? '-' }}</td>
                    <td>{{ $registration->test->wawancaraAsisten ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="page-break"></div>

    <h2>Total Nilai Wawancara Dosen</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Minatan</th>
                <th>Dosen 1</th>
                <th>Dosen 2</th>
                <th>Dosen 3</th>
                <th>Dosen 4</th>
                <th>Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $registration)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $registration->name }}</td>
                    <td>{{ $registration->class }} - {{ $registration->period }}</td>
                    <td>{{ $registration->course->name ?? '-' }}</td>
                    <td>{{ $registration->test->testDetail->dosen1 ?? '-' }}</td>
                    <td>{{ $registration->test->testDetail->dosen2 ?? '-' }}</td>
                    <td>{{ $registration->test->testDetail->dosen3 ?? '-' }}</td>
                    <td>{{ $registration->test->testDetail->dosen4 ?? '-' }}</td>
                    <td>{{ $registration->test->wawancaraDosen ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
