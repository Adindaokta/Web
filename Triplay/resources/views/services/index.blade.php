@extends('layouts.app')

@section('content')
<section class="pt-32 pb-24 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">

        @include('components.back-button')

        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-500/10 border border-emerald-400/20 text-emerald-300 text-sm font-semibold mb-4">
                SERVICES
            </span>

            <h1 class="text-4xl md:text-6xl font-black text-white mb-5">
                Layanan Tambahan
            </h1>

            <p class="text-neutral-400 text-lg">
                Pilih layanan tambahan seperti ojek, sewa perlengkapan, guide, porter, atau dokumentasi. Layanan bisa dipesan terpisah atau ditambahkan saat booking destinasi.
            </p>
        </div>

       <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-12">
    <div class="soft-card rounded-2xl p-6 text-center hover:-translate-y-1 transition">
        <div class="text-3xl mb-3">🛵</div>
        <p class="text-white font-black">Ojek</p>
        <p class="text-neutral-400 text-sm mt-2">Transport lokal menuju meeting point.</p>
    </div>

    <div class="soft-card rounded-2xl p-6 text-center hover:-translate-y-1 transition">
        <div class="text-3xl mb-3">🎒</div>
        <p class="text-white font-black">Sewa Perlengkapan</p>
        <p class="text-neutral-400 text-sm mt-2">Peralatan outdoor untuk kebutuhan trip.</p>
    </div>

    <div class="soft-card rounded-2xl p-6 text-center hover:-translate-y-1 transition">
        <div class="text-3xl mb-3">🧭</div>
        <p class="text-white font-black">Guide</p>
        <p class="text-neutral-400 text-sm mt-2">Pemandu perjalanan dan arahan rute.</p>
    </div>

    <div class="soft-card rounded-2xl p-6 text-center hover:-translate-y-1 transition">
        <div class="text-3xl mb-3">📷</div>
        <p class="text-white font-black">Dokumentasi</p>
        <p class="text-neutral-400 text-sm mt-2">Foto atau video perjalanan.</p>
    </div>
</div>

        @if($services->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="soft-card rounded-3xl overflow-hidden">

                        <div class="h-56 bg-black/20">
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}"
                                     class="w-full h-full object-cover"
                                     alt="{{ $service->name }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-neutral-400">
                                    Gambar layanan belum tersedia
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            <span class="inline-flex px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-300 text-xs font-bold uppercase mb-4">
                                {{ $service->type }}
                            </span>

                            <h3 class="text-2xl font-black text-white mb-3">
                                {{ $service->name }}
                            </h3>

                            <p class="text-neutral-400 mb-5">
                                {{ $service->description ?: 'Deskripsi layanan belum tersedia.' }}
                            </p>

                            <div class="mb-6">
                                <span class="text-3xl font-black text-emerald-400">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </span>
                                <span class="text-neutral-400 text-sm">
                                    / {{ $service->unit }}
                                </span>
                            </div>

                            @guest
                                <a href="{{ route('login') }}"
                                   class="block text-center rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-6 py-3 transition">
                                    Login untuk Sewa
                                </a>
                            @else
                                <a href="{{ route('service-orders.create', $service->id) }}"
                                   class="block text-center rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-6 py-3 transition">
                                    Sewa Sekarang
                                </a>
                            @endguest
                        </div>

                    </div>
                @endforeach
            </div>
        @else
            <div class="soft-card rounded-3xl p-10 text-center">
                <h3 class="text-2xl font-black text-white mb-3">
                    Belum Ada Layanan
                </h3>

                <p class="text-neutral-400">
                    Layanan tambahan belum tersedia. Admin dapat menambahkan layanan dari dashboard admin.
                </p>
            </div>
        @endif

    </div>
</section>
@endsection
