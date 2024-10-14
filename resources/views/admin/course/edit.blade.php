@extends('layouts.admin.app')

@section('title', 'Tambah Mata Kuliah')

@section('content')
    <section class="bg-gray-950 text-gray-200">
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-4xl font-medium text-gray-300 pb-6">Tambah Mata Kuliah</h2>
            <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div>
                    <label for="name" class="block text-gray-300">Nama Mata Kuliah:</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $course->name) }}"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>
                <div>
                    <label for="description" class="block text-gray-300">Deskripsi:</label>
                    <input type="text" name="description" id="description"
                        value="{{ old('description', $course->description) }}"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>
                <div>
                    <label for="image" class="block text-gray-300">Upload Gambar Mata Kuliah:</label>
                    <input type="file" name="image" id="image" value="{{ $course->image }}"
                        class="border border-gray-600 rounded-md px-3 py-2 mt-1 mb-3 w-full sm:w-1/2 lg:w-1/3 bg-gray-800 text-gray-200">
                </div>

                <x-primary-button type="submit">Edit Mata Kuliah</x-primary-button>
            </form>
        </div>
    </section>
@endsection
