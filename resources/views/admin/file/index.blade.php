@extends('layouts.admin.app')

@section('title', 'Kelola Berkas')

@section('content')
    <section class="bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Kelola Berkas</h2>
            <div class="flex items-center justify-end mb-4">
                <label for="filterStatus" class="text-gray-300 text-lg mr-4">Filter Status:</label>
                <select id="filterStatus" onchange="filterStatus()"
                    class="block w-1/6 p-2 text-gray-900 bg-white rounded-md shadow-sm  border border-gray-400">
                    <option value="">Semua</option>
                    <option value="Menunggu">Menunggu</option>
                    <option value="Diterima">Diterima</option>
                    <option value="Ditolak">Ditolak</option>
                </select>
            </div>
            <div class="relative overflow-x-auto shadow-md rounded-lg">
                <table class="w-full text-sm text-left text-gray-400 bg-gray-900">
                    <thead class="text-xs uppercase bg-gray-700 text-gray-400 text-center">
                        <tr>
                            <th scope="col" class="px-3 py-3">No</th>
                            <th scope="col" class="px-3 py-3">Nama</th>
                            <th scope="col" class="px-3 py-3">NPM</th>
                            <th scope="col" class="px-3 py-3">Kelas</th>
                            <th scope="col" class="px-3 py-3">tgl Daftar</th>
                            <th scope="col" class="px-3 py-3">Matkul Minat</th>
                            <th scope="col" class="px-3 py-3">Status Pendaftaran</th>
                            <th scope="col" class="px-3 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $key => $registration)
                            <tr class="text-center bg-gray-800 border-b border-gray-700">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $registration->name }}</td>
                                <td>{{ $registration->npm }}</td>
                                <td>{{ $registration->class }} - {{ $registration->period }}</td>
                                <td>{{ $registration->regDate }}</td>
                                <td>{{ $registration->course->name }}</td>
                                <td>{{ $registration->status }}</td>
                                <td>
                                    <x-primary-button tag="a" href="{{ route('show.verify', $registration->id) }}">
                                        Verifikasi
                                    </x-primary-button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        function filterStatus() {
            var filterStatus = document.getElementById('filterStatus').value;
            var rows = document.getElementsByTagName('tr');
            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                var status = row.cells[6].innerText;
                if (filterStatus === '' || filterStatus === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        }
    </script>
@endsection
