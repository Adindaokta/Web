@extends('layouts.app')

@section('content')

<section class="pt-32 pb-24 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">

        {{-- BACK BUTTON --}}
        <div class="mb-10">
            <a href="{{ route('home') }}#adventure"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/10 hover:bg-white/15 border border-white/10 text-white font-semibold transition">
                <span>←</span>
                <span>Kembali ke Home</span>
            </a>
        </div>

        {{-- HEADER --}}
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-500/10 border border-emerald-400/20 text-emerald-300 text-sm font-semibold mb-4">
                OUR ADVENTURES
            </span>

            <h1 class="text-4xl md:text-6xl font-black text-white mb-5">
                Pilih Petualangan
                <span class="block text-emerald-400">
                    Healing Terbaikmu
                </span>
            </h1>

            <p class="text-neutral-400 text-lg leading-relaxed">
                Temukan pengalaman alam premium yang menyatukan petualangan, ketenangan,
                dan proses penyembuhan diri.
            </p>
        </div>

        {{-- 3 MAIN CATEGORY CARDS WITH VIDEO --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-24">

            {{-- HIKING --}}
            <div class="soft-card rounded-3xl overflow-hidden transition duration-300 hover:-translate-y-1">
                <div class="h-64 relative overflow-hidden">
                    <video class="w-full h-full object-cover"
                           autoplay muted loop playsinline preload="metadata">
                        <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
                    </video>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                    <div class="absolute top-4 right-4 w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-md border border-white/10 flex items-center justify-center text-2xl">
                        🥾
                    </div>
                </div>

                <div class="p-7">
                    <h2 class="text-2xl font-black text-emerald-400 mb-3">
                        Hiking
                    </h2>

                    <p class="text-neutral-400 leading-relaxed mb-6">
                        Perjalanan santai hingga menengah, cocok untuk relaksasi cepat dan pemula.
                    </p>

                    @guest
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center gap-2 text-emerald-400 font-bold hover:text-emerald-300 transition">
                            Explore <span>→</span>
                        </a>
                    @else
                        <a href="{{ route('destinations.category', 'hiking') }}"
                           class="inline-flex items-center gap-2 text-emerald-400 font-bold hover:text-emerald-300 transition">
                            Explore <span>→</span>
                        </a>
                    @endguest
                </div>
            </div>

            {{-- TREKKING --}}
            <div class="soft-card rounded-3xl overflow-hidden transition duration-300 hover:-translate-y-1">
                <div class="h-64 relative overflow-hidden">
                    <video class="w-full h-full object-cover"
                           autoplay muted loop playsinline preload="metadata">
                        <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
                    </video>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                    <div class="absolute top-4 right-4 w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-md border border-white/10 flex items-center justify-center text-2xl">
                        ⛰️
                    </div>
                </div>

                <div class="p-7">
                    <h2 class="text-2xl font-black text-emerald-400 mb-3">
                        Trekking
                    </h2>

                    <p class="text-neutral-400 leading-relaxed mb-6">
                        Ekspedisi multi-hari untuk pengalaman healing mendalam dan penuh tantangan.
                    </p>

                    @guest
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center gap-2 text-emerald-400 font-bold hover:text-emerald-300 transition">
                            Explore <span>→</span>
                        </a>
                    @else
                        <a href="{{ route('destinations.category', 'trekking') }}"
                           class="inline-flex items-center gap-2 text-emerald-400 font-bold hover:text-emerald-300 transition">
                            Explore <span>→</span>
                        </a>
                    @endguest
                </div>
            </div>

            {{-- CAMPING --}}
            <div class="soft-card rounded-3xl overflow-hidden transition duration-300 hover:-translate-y-1">
                <div class="h-64 relative overflow-hidden">
                    <video class="w-full h-full object-cover"
                           autoplay muted loop playsinline preload="metadata">
                        <source src="{{ asset('videos/video3.mp4') }}" type="video/mp4">
                    </video>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                    <div class="absolute top-4 right-4 w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-md border border-white/10 flex items-center justify-center text-2xl">
                        ⛺
                    </div>
                </div>

                <div class="p-7">
                    <h2 class="text-2xl font-black text-emerald-400 mb-3">
                        Camping
                    </h2>

                    <p class="text-neutral-400 leading-relaxed mb-6">
                        Menginap di alam terbuka untuk ketenangan dan koneksi lebih dekat dengan alam.
                    </p>

                    @guest
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center gap-2 text-emerald-400 font-bold hover:text-emerald-300 transition">
                            Explore <span>→</span>
                        </a>
                    @else
                        <a href="{{ route('destinations.category', 'camping') }}"
                           class="inline-flex items-center gap-2 text-emerald-400 font-bold hover:text-emerald-300 transition">
                            Explore <span>→</span>
                        </a>
                    @endguest
                </div>
            </div>

        </div>

        {{-- FEATURED DESTINATIONS --}}
        <div class="mb-10">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-3">
                Rekomendasi Destinasi
            </h2>

            <p class="text-neutral-400">
                Perwakilan destinasi terbaru dari setiap kategori petualangan.
            </p>
        </div>

        @if(isset($featuredDestinations) && $featuredDestinations->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredDestinations as $destination)
                    <div class="soft-card rounded-3xl overflow-hidden">
                        <div class="h-64 relative">
                            @if(!empty($destination->image))
                                <img src="{{ asset('storage/' . $destination->image) }}"
                                     alt="{{ $destination->title }}"
                                     class="w-full h-full object-cover"
                                     onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');">

                                <div class="hidden w-full h-full items-center justify-center bg-black/20 text-neutral-400">
                                    Gambar tidak ditemukan
                                </div>
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-black/20 text-neutral-400">
                                    Gambar tidak tersedia
                                </div>
                            @endif

                            <div class="absolute top-4 right-4">
                                <span class="px-4 py-2 rounded-full bg-emerald-500/20 border border-emerald-400/20 text-emerald-300 text-sm font-bold uppercase">
                                    {{ $destination->category }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3 class="text-2xl font-black text-white mb-2">
                                {{ $destination->title }}
                            </h3>

                            <p class="text-neutral-400 mb-4 line-clamp-2">
                                {{ $destination->description }}
                            </p>

                            <div class="flex items-end justify-between mb-6">
                                <div class="text-2xl font-black text-white">
                                    Rp {{ number_format($destination->price, 0, ',', '.') }}
                                </div>
                                <div class="text-neutral-400 text-sm">/ pax</div>
                            </div>

                            <a href="{{ route('destinations.show', $destination->id) }}"
                               class="block w-full text-center rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-6 py-3 transition">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="soft-card rounded-3xl p-10 text-center">
                <h3 class="text-2xl font-black text-white mb-3">
                    Belum Ada Destinasi
                </h3>

                <p class="text-neutral-400">
                    Silakan tambahkan destinasi melalui dashboard admin.
                </p>
            </div>
        @endif

    </div>
</section>

@endsection
