@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-neutral-900 px-6 py-10 text-white">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-12">
        <div>
            <h2 class="text-5xl font-black mb-2">
                Overview
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">
                    Dashboard
                </span>
            </h2>
            <p class="text-neutral-400">
                Kelola destinasi wisata Triplay Healing
            </p>
        </div>

        <div class="mt-6 md:mt-0 w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg">
            <i class="fas fa-mountain text-white text-2xl"></i>
        </div>
    </div>

    <!-- STAT CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-14">

        <!-- TOTAL DESTINATIONS -->
        <div class="bg-neutral-800/60 backdrop-blur-xl border border-white/5 rounded-2xl p-8 shadow-xl hover:bg-neutral-800 transition">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-emerald-500/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-map-marked-alt text-emerald-400 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-neutral-400 uppercase font-semibold">Total Paket</p>
                    <h3 class="text-4xl font-black text-white">{{ $totalDestinations }}</h3>
                </div>
            </div>
        </div>

        <!-- TOTAL USERS -->
        <div class="bg-neutral-800/60 backdrop-blur-xl border border-white/5 rounded-2xl p-8 shadow-xl hover:bg-neutral-800 transition">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-teal-500/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-teal-400 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm text-neutral-400 uppercase font-semibold">Total Users</p>
                    <h3 class="text-4xl font-black text-white">{{ $totalUsers }}</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLE -->
    <div class="bg-neutral-800/60 backdrop-blur-xl border border-white/5 rounded-2xl shadow-2xl overflow-hidden">

        <!-- TABLE HEADER -->
        <div class="p-8 border-b border-white/5 flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-bold text-white mb-1">Paket Terbaru</h3>
                <p class="text-neutral-400 text-sm">Destinasi yang baru ditambahkan</p>
            </div>

            <span class="flex items-center gap-2 px-4 py-2 bg-emerald-500/10 border border-emerald-500/20 rounded-full text-emerald-400 text-xs font-semibold">
                <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                Live Data
            </span>
        </div>

        <!-- TABLE CONTENT -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-neutral-900 text-neutral-400 text-xs uppercase">
                    <tr>
                        <th class="p-5 text-left">Nama Paket</th>
                        <th class="p-5 text-left">Kategori</th>
                        <th class="p-5 text-left">Harga</th>
                        <th class="p-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($recentDestinations as $item)
                    <tr class="hover:bg-white/5 transition">
                        <td class="p-5 font-semibold text-white">
                            {{ $item->title }}
                        </td>

                        <td class="p-5">
                            <span class="inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold rounded-lg
                                bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                {{ ucfirst($item->category) }}
                            </span>
                        </td>

                        <td class="p-5 font-bold text-white">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </td>

                        <td class="p-5 text-center">
                            <a href="{{ route('admin.destinations.edit', $item->id) }}"
                               class="inline-flex items-center gap-2 px-6 py-2 bg-emerald-600 hover:bg-emerald-500 rounded-lg text-sm font-semibold transition">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <div class="py-16 text-center">
                                <div class="w-24 h-24 mx-auto bg-emerald-500/10 rounded-full flex items-center justify-center mb-6">
                                    <i class="fas fa-mountain text-emerald-400 text-3xl"></i>
                                </div>
                                <h4 class="text-2xl font-bold text-white mb-2">Belum Ada Destinasi</h4>
                                <p class="text-neutral-400 mb-6">Tambahkan destinasi pertama Anda</p>
                                <a href="{{ route('admin.destinations.create') }}"
                                   class="inline-flex px-8 py-3 bg-emerald-600 hover:bg-emerald-500 rounded-lg font-semibold transition">
                                    Tambah Destinasi
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>
@endsection
