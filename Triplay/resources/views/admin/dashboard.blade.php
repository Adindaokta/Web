@extends('layouts.admin')

@section('content')
<div class="p-6 space-y-8">

    {{-- HEADER --}}
    <div class="bg-neutral-900 border border-white/10 rounded-3xl p-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <p class="text-emerald-400 text-sm font-bold uppercase tracking-wider mb-2">
                    Staff Panel
                </p>

                <h1 class="text-4xl font-black text-white">
                    Dashboard <span class="text-emerald-400">Admin Staff</span>
                </h1>

                <p class="text-gray-400 mt-2">
                    Panel operasional untuk mengelola destinasi, layanan, dan data pesanan.
                </p>
            </div>

            <div class="w-16 h-16 rounded-2xl bg-emerald-600 flex items-center justify-center text-white text-2xl font-black">
                🧭
            </div>
        </div>
    </div>

    {{-- SUMMARY CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="rounded-2xl bg-neutral-900 border border-white/10 p-6">
            <p class="text-gray-400 text-sm font-semibold uppercase">Total Destinasi</p>
            <h2 class="text-4xl font-black text-white mt-3">
                {{ $totalDestinations }}
            </h2>
        </div>

        <div class="rounded-2xl bg-neutral-900 border border-white/10 p-6">
            <p class="text-gray-400 text-sm font-semibold uppercase">Total User</p>
            <h2 class="text-4xl font-black text-white mt-3">
                {{ $totalUsers }}
            </h2>
        </div>

        <div class="rounded-2xl bg-neutral-900 border border-white/10 p-6">
            <p class="text-gray-400 text-sm font-semibold uppercase">Tugas Operasional</p>
            <h2 class="text-4xl font-black text-emerald-400 mt-3">
                Aktif
            </h2>
            <p class="text-xs text-gray-500 mt-2">
                Admin staff tidak memiliki akses laporan keuangan owner.
            </p>
        </div>

    </div>

    {{-- QUICK ACTION --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <a href="{{ route('admin.destinations.create') }}"
           class="rounded-2xl bg-emerald-600 hover:bg-emerald-500 p-6 transition">
            <h3 class="text-xl font-black text-white mb-2">
                Tambah Destinasi
            </h3>
            <p class="text-emerald-50 text-sm">
                Tambahkan paket hiking, trekking, atau camping baru.
            </p>
        </a>

        <a href="{{ route('admin.destinations') }}"
           class="rounded-2xl bg-neutral-900 border border-white/10 hover:border-emerald-400/40 p-6 transition">
            <h3 class="text-xl font-black text-white mb-2">
                Kelola Destinasi
            </h3>
            <p class="text-gray-400 text-sm">
                Edit, hapus, dan perbarui informasi destinasi.
            </p>
        </a>

        <a href="{{ route('home') }}"
           class="rounded-2xl bg-neutral-900 border border-white/10 hover:border-emerald-400/40 p-6 transition">
            <h3 class="text-xl font-black text-white mb-2">
                Lihat Website
            </h3>
            <p class="text-gray-400 text-sm">
                Buka tampilan website dari sisi pengguna.
            </p>
        </a>

    </div>

    {{-- TABLE --}}
    <div class="rounded-2xl bg-neutral-900 border border-white/10 overflow-hidden">
        <div class="p-6 border-b border-white/10">
            <h3 class="text-xl font-black text-white">
                Paket Terbaru
            </h3>
            <p class="text-gray-400 text-sm">
                Destinasi yang baru ditambahkan.
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-black/30 text-gray-400">
                    <tr>
                        <th class="px-6 py-4 text-left">Nama Paket</th>
                        <th class="px-6 py-4 text-left">Kategori</th>
                        <th class="px-6 py-4 text-left">Harga</th>
                        <th class="px-6 py-4 text-left">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-white/10">
                    @forelse($recentDestinations as $destination)
                        <tr class="text-gray-300">
                            <td class="px-6 py-4 font-bold text-white">
                                {{ $destination->title }}
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 text-xs font-bold">
                                    {{ $destination->category }}
                                </span>
                            </td>

                            <td class="px-6 py-4 font-bold">
                                Rp {{ number_format($destination->price, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4">
                                <a href="{{ route('admin.destinations.edit', $destination->id) }}"
                                   class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                Belum ada destinasi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
