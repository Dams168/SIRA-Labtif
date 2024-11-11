@extends('layouts.admin.app')

@section('title', 'Kelola Nilai')

@section('content')
    <section class="bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Kelola Nilai</h2>
            <div class="relative overflow-x-auto">
                <div class="flex items-center justify-end mb-4">
                    <label for="filterPeriod" class="text-gray-300 text-lg mr-4">Filter Angkatan:</label>
                    <select id="filterPeriod" onchange="filterPeriod()"
                        class="block w-1/6 p-2 text-gray-900 bg-white rounded-md shadow-sm  border border-gray-400">
                        <option value="">Semua</option>
                        @for ($i = date('Y'); $i >= 2021; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>

                    <label for="filterStatus" class="text-gray-300 text-lg mr-4">Filter Status:</label>
                    <select id="filterStatus" onchange="filterStatus()"
                        class="block w-1/6 p-2 text-gray-900 bg-white rounded-md shadow-sm  border border-gray-400">
                        <option value="">Semua</option>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>
                <div class="min-w-full inline-block align-middle">
                    <table class="w-full text-sm text-left text-gray-400 bg-gray-900">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400 text-center">
                            <tr>
                                <th scope="col" class="px-3 py-3">No</th>
                                <th scope="col" class="px-3 py-3">Nama</th>
                                <th scope="col" class="px-3 py-3">Kelas</th>
                                <th scope="col" class="px-3 py-3">Matkul Minat</th>
                                <th scope="col" class="px-3 py-3">Nilai Test Tulis Dan Praktik</th>
                                <th scope="col" class="px-3 py-3">Nilai Wawancara Asisten</th>
                                <th scope="col" class="px-3 py-3">Nilai Wawancara Dosen</th>
                                <th scope="col" class="px-3 py-3">Nilai Akhir</th>
                                <th scope="col" class="px-3 py-3">Hasil</th>
                                <th scope="col" class="px-3 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrations as $registration)
                                <tr class="text-center bg-gray-800 border-b border-gray-700">
                                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-4">{{ $registration->name }}</td>
                                    <td class="py-2 px-4">{{ $registration->class }} - {{ $registration->period }}</td>
                                    <td class="py-2 px-4">{{ $registration->course->name }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->testTulis ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->wawancaraAsisten ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->wawancaraDosen ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->result->finalScore ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $registration->test->result->result ?? '-' }}</td>
                                    <td class="py-2 px-4">
                                        <x-primary-button tag="a"
                                            href="{{ route('score.create', $registration->id) }}"
                                            class="text-blue-500 hover:underline">Edit</x-primary-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        function filterStatus() {
            var filterStatus = document.getElementById('filterStatus').value;
            var rows = document.getElementsByTagName('tr');
            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var status = row.cells[8].innerText;
                if (filterStatus === '' || status === filterStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }

        function filterPeriod() {
            var filterPeriod = document.getElementById('filterPeriod').value;
            var rows = document.getElementsByTagName('tr');
            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var period = row.cells[2].innerText.split(' - ')[1];
                if (filterPeriod === '' || period === filterPeriod) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }
    </script>
@endsection
