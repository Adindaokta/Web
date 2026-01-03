@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-6xl mx-auto bg-white rounded-xl shadow-2xl overflow-hidden">

        <!-- Header & Galeri Sederhana -->
        <div class="bg-gray-800 text-white p-6">
            <h1 class="text-4xl font-extrabold mb-2">{{ $destination->name }}</h1>
            <p class="text-indigo-400 font-semibold uppercase tracking-wider">{{ $destination->category }}</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 p-8">

            <!-- Kolom Kiri: Detail & Definisi -->
            <div class="lg:col-span-2">

                <!-- Definisi Tempat -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-3 border-b pb-1">Definisi dan Deskripsi</h2>
                    <p class="text-gray-700 leading-relaxed">{{ $destination->description }}</p>
                </div>

                <!-- Informasi Spesifik -->
                <div class="grid grid-cols-2 gap-4 border-t pt-4">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Lokasi / Kabupaten</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $destination->location }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Ketinggian (mdpl)</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $destination->height }} mdpl</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Estimasi Waktu Puncak</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $destination->estimation_time }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Harga Paket Dasar</p>
                        <p class="text-lg font-semibold text-green-600">Rp {{ number_format($destination->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Gambar dan Booking -->
            <div class="lg:col-span-1 bg-indigo-50 p-6 rounded-lg shadow-inner flex flex-col justify-between">
                <div>
                    <h2 class="text-xl font-bold text-indigo-800 mb-4">Galeri Tempat</h2>
                    <!-- Placeholder Gambar - Ganti dengan $destination->image_url jika ada -->
                    <div class="h-40 bg-gray-300 rounded-lg mb-4 flex items-center justify-center text-sm text-gray-600">
                        [Placeholder Foto Tempat]
                    </div>

                    <p class="text-sm text-gray-600 italic">Klik booking untuk memulai pengalaman healing Anda.</p>
                </div>

                <!-- Tombol Booking -->
                <a href="{{ route('booking.create', ['destination' => $destination->id]) }}"
                   class="w-full text-center mt-6 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-xl transition duration-300 shadow-lg transform hover:scale-[1.02]">
                    BOOKING SEKARANG
                </a>

                <a href="{{ route('destinations.index', ['category' => $destination->category]) }}"
                   class="w-full text-center mt-3 text-sm text-indigo-500 hover:text-indigo-800 font-medium">
                    Kembali ke Daftar {{ $destination->category }}
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="bg-white p-8 rounded-lg shadow-xl">

        <!-- Judul Post -->
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4 border-b pb-2">{{ $post->title }}</h1>

        <!-- Metadata -->
        <p class="text-sm text-gray-500 mb-6">
            ID: {{ $post->id }} | Dibuat pada: {{ $post->created_at->format('d M Y, H:i') }}
        </p>

        <!-- Isi Konten -->
        <div class="prose max-w-none text-gray-700 leading-relaxed pt-6">
            <!-- Menggunakan nl2br(e()) untuk menampilkan baris baru di konten -->
            {!! nl2br(e($post->content)) !!}
        </div>

        <div class="mt-8 flex gap-3">
            <!-- Tombol Kembali -->
            <a href="{{ route('posts.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition duration-300 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>

            <!-- Tombol Edit -->
            <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                Edit Post
            </a>

            <!-- Tombol Hapus (dalam form) -->
            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300" onclick="return confirm('Apakah Anda yakin ingin menghapus post ini?')">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
