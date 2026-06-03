@extends('layouts.admin')

@section('content')
<div class="p-6 space-y-8">

    {{-- HEADER --}}
    <div class="bg-neutral-900 border border-white/10 rounded-3xl p-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <p class="text-emerald-400 text-sm font-bold uppercase tracking-wider mb-2">
                    Owner Panel
                </p>

                <h1 class="text-4xl font-black text-white">
                    Dashboard <span class="text-emerald-400">Superadmin</span>
                </h1>

                <p class="text-gray-400 mt-2">
                    Panel khusus owner untuk memantau operasional, pemasukan, pengeluaran, dan performa bisnis.
                </p>
            </div>

            <div class="w-16 h-16 rounded-2xl bg-emerald-600 flex items-center justify-center text-white text-2xl font-black">
                👑
            </div>
        </div>
    </div>

    {{-- SUMMARY CARDS --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

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
            <p class="text-gray-400 text-sm font-semibold uppercase">Total Pendapatan</p>
            <h2 class="text-3xl font-black text-emerald-400 mt-3">
                Rp 0
            </h2>
            <p class="text-xs text-gray-500 mt-2">
                Aktif setelah modul payment dibuat.
            </p>
        </div>

        <div class="rounded-2xl bg-neutral-900 border border-white/10 p-6">
            <p class="text-gray-400 text-sm font-semibold uppercase">Total Pengeluaran</p>
            <h2 class="text-3xl font-black text-red-400 mt-3">
                Rp 0
            </h2>
            <p class="text-xs text-gray-500 mt-2">
                Aktif setelah modul expenses dibuat.
            </p>
        </div>

    </div>

    {{-- OWNER FINANCE AREA --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="rounded-2xl bg-neutral-900 border border-white/10 p-6">
            <h3 class="text-xl font-black text-white mb-3">
                Laba Bersih
            </h3>

            <p class="text-4xl font-black text-emerald-400">
                Rp 0
            </p>

            <p class="text-gray-500 text-sm mt-3">
                Rumus: total pemasukan dikurangi total pengeluaran.
            </p>
        </div>

        <div class="rounded-2xl bg-neutral-900 border border-white/10 p-6">
            <h3 class="text-xl font-black text-white mb-3">
                Booking Bulan Ini
            </h3>

            <p class="text-4xl font-black text-white">
                0
            </p>

            <p class="text-gray-500 text-sm mt-3">
                Aktif setelah sistem booking dibuat.
            </p>
        </div>

        <div class="rounded-2xl bg-neutral-900 border border-white/10 p-6">
            <h3 class="text-xl font-black text-white mb-3">
                Transaksi Pending
            </h3>

            <p class="text-4xl font-black text-yellow-400">
                0
            </p>

            <p class="text-gray-500 text-sm mt-3">
                Aktif setelah sistem pembayaran dibuat.
            </p>
        </div>

    </div>

    {{-- GRAPH PLACEHOLDER --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <div class="rounded-2xl bg-neutral-900 border border-white/10 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-black text-white">
                    Grafik Pemasukan Bulanan
                </h3>

                <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 text-xs font-bold">
                    Owner Only
                </span>
            </div>

            <div class="h-72 rounded-2xl bg-black/30 border border-white/10 flex items-center justify-center text-gray-500">
                Grafik akan tampil setelah payment gateway aktif.
            </div>
        </div>

        <div class="rounded-2xl bg-neutral-900 border border-white/10 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-black text-white">
                    Grafik Pengeluaran Bulanan
                </h3>

                <span class="px-3 py-1 rounded-full bg-red-500/10 text-red-400 text-xs font-bold">
                    Owner Only
                </span>
            </div>

            <div class="h-72 rounded-2xl bg-black/30 border border-white/10 flex items-center justify-center text-gray-500">
                Grafik akan tampil setelah modul expenses aktif.
            </div>
        </div>

    </div>

    {{-- TABLE --}}
    <div class="rounded-2xl bg-neutral-900 border border-white/10 overflow-hidden">
        <div class="p-6 border-b border-white/10 flex items-center justify-between">
            <div>
                <h3 class="text-xl font-black text-white">
                    Destinasi Terbaru
                </h3>
                <p class="text-gray-400 text-sm">
                    Data destinasi terbaru yang ditambahkan admin.
                </p>
            </div>

            <a href="{{ route('admin.destinations') }}"
               class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-sm font-bold">
                Kelola Destinasi
            </a>
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
