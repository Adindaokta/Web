@extends('layouts.app')
{{-- Ganti 'layouts.app' jika layout utama Anda punya nama lain --}}

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Daftar Post</h2>
        {{-- Tombol untuk pindah ke halaman tambah data --}}
        <a href="{{ route('posts.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-300">
            + Tambah Post Baru
        </a>
    </div>

    @if ($posts->isEmpty())
        <div class="text-center py-10 bg-gray-50 rounded-xl shadow-inner">
            <p class="text-gray-600 italic">Belum ada post yang dibuat.</p>
        </div>
    @else
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Isi (Preview)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $post)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $post->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ str()->limit($post->content, 50) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            {{-- Link Aksi (akan kita implementasikan nanti) --}}
                            <a href="{{ route('posts.show', $post) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Lihat</a>
                            <a href="{{ route('posts.edit', $post) }}" class="text-yellow-600 hover:text-yellow-900 mr-4">Edit</a>

                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus post ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
