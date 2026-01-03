@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Buat Post Baru</h2>

    {{-- Form untuk Tambah Data --}}
    <form action="{{ route('posts.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

        {{-- Field Judul --}}
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul Post:</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('title') }}">
        </div>

        {{-- Field Konten --}}
        <div class="mb-6">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Isi Konten:</label>
            <textarea name="content" id="content" rows="6" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
            Simpan Post
        </button>
    </form>
</div>
@endsection
