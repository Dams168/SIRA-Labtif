@extends('layouts.admin.app')

@section('title', 'Kelola Course')

@section('content')
    <section class="bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-12">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Kelola Mata Kuliah Minatan</h2>
            <div class="relative overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <x-primary-button tag="a" href="{{ route('course.create') }}">
                        Tambah Matakuliah Minatan
                    </x-primary-button>
                    <table class="w-full text-sm text-left text-gray-400 bg-gray-900">
                        <thead class="text-xs uppercase bg-gray-700 text-gray-400 text-center">
                            <tr>
                                <th scope="col" class="px-3 py-3">No</th>
                                <th scope="col" class="px-3 py-3">Nama Mata Kuliah</th>
                                <th scope="col" class="px-3 py-3">Image</th>
                                <th scope="col" class="px-3 py-3">Deskripsi</th>
                                <th scope="col" class="px-3 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                                <tr class="text-center bg-gray-800 border-b border-gray-700">
                                    <td class="py-2 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-4">{{ $course->name }}</td>
                                    <td class="py-2 px-4">
                                        <img src="{{ asset('storage/course/' . ($course->image ?? '')) }}"
                                            alt="Uploaded Image"
                                            onerror="this.onerror=null; this.src='{{ asset($course->image) }}';"
                                            alt="{{ $course->name }}" class="w-20 h-20">
                                    </td>
                                    <td class="py-2 px-4">{{ $course->description }}</td>
                                    <td class="py-2 px-4">
                                        <x-primary-button tag="a" href="{{ route('course.edit', $course->id) }}">
                                            Edit
                                        </x-primary-button>
                                        <form action="{{ route('course.destroy', $course->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit">
                                                Hapus
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
