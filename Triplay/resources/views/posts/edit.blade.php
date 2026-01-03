@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Edit Post: {{ $post->title }}</h2>

    {{-- Form untuk Edit Data --}}
    {{-- Action akan mengarah ke method update di Controller --}}
    <form action="{{ route('posts.update', $post) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf
        @method('PUT') {{-- PENTING! Untuk signaling method UPDATE --}}

        {{-- Field Judul --}}
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul Post:</label>
            <input
                type="text"
                name="title"
                id="title"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror"
                {{-- Menggunakan old() untuk error, atau $post->title untuk data lama --}}
                value="{{ old('title', $post->title) }}"
                required
            >
            @error('title')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Field Konten --}}
        <div class="mb-6">
            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Isi Konten:</label>
            <textarea
                name="content"
                id="content"
                rows="6"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror"
                required
            >{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                Update Post
            </button>
            <a href="{{ route('posts.index') }}" class="text-gray-600 hover:text-gray-900 text-sm">Batal</a>
        </div>
    </form>
</div>
@endsection
