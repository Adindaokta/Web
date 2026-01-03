@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-neutral-900 px-6 py-10 text-white">

    <div class="flex justify-between items-center mb-10">
        <h2 class="text-4xl font-black">
            Manajemen
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">
                Destinasi
            </span>
        </h2>

        <a href="{{ route('admin.destinations.create') }}"
           class="px-8 py-3 bg-emerald-600 hover:bg-emerald-500 rounded-xl font-bold shadow-lg transition">
            + Tambah
        </a>
    </div>

    <div class="bg-neutral-800/70 backdrop-blur-xl border border-white/5 rounded-2xl overflow-hidden shadow-2xl">
        <table class="w-full">
            <thead class="bg-neutral-900 text-neutral-400 text-sm uppercase">
                <tr>
                    <th class="p-5 text-left">Paket</th>
                    <th class="p-5">Kategori</th>
                    <th class="p-5">Harga</th>
                    <th class="p-5">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach($destinations as $item)
                <tr class="hover:bg-white/5 transition">
                    <td class="p-5 font-semibold">{{ $item->title }}</td>
                    <td class="p-5 text-center">{{ ucfirst($item->category) }}</td>
                    <td class="p-5 text-center">Rp {{ number_format($item->price,0,',','.') }}</td>
                    <td class="p-5 text-center space-x-3">
                        <a href="{{ route('admin.destinations.edit',$item->id) }}" class="text-emerald-400 hover:underline">Edit</a>
                        <form action="{{ route('admin.destinations.destroy',$item->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus?')" class="text-red-400 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-6 border-t border-white/5">
            {{ $destinations->links() }}
        </div>
    </div>
</div>
@endsection
