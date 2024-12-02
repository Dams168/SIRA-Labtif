<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Jadwal Rekrutmen</title>
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

        .schedule-section {
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <h1>Jadwal Rekrutmen</h1>

    @php
        $testTypes = ['Test Tulis', 'Wawancara Asisten', 'Wawancara Dosen'];
    @endphp

    @foreach ($testTypes as $testType)
        <div class="schedule-section">
            <h3>{{ $testType }}</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>Tanggal</th>
                        <th>Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach ($registrations as $registration)
                        @php
                            $schedule = $registration->schedules->firstWhere('scheduleName', $testType);
                        @endphp
                        @if ($schedule)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $registration->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($schedule->scheduleDate)->format('d-m-Y') }}</td>
                                <td>{{ $schedule->room }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach

</body>

</html>
