@extends('layouts.app')

@section('content')

{{-- ====== STYLE TAMBAHAN ====== --}}
<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
}

.glass {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}
</style>

{{-- ====== PAGE WRAPPER ====== --}}
<div class="min-h-screen bg-neutral-900 py-32">

    {{-- ====== HEADER ====== --}}
    <div class="max-w-7xl mx-auto px-6 text-center mb-20 fade-in-up">
        <div class="inline-block mb-6 px-4 py-2 glass rounded-full">
            <span class="text-emerald-400 text-sm font-semibold tracking-wider uppercase">
                Our Adventures
            </span>
        </div>

        <h1 class="text-5xl md:text-6xl font-black text-white mb-6">
            Pilih Petualangan<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">
                Healing Terbaikmu
            </span>
        </h1>

        <p class="text-neutral-300 max-w-3xl mx-auto text-lg">
            Temukan pengalaman alam premium yang menyatukan petualangan, ketenangan,
            dan proses penyembuhan diri
        </p>
    </div>

    {{-- ====== CATEGORY CARDS (DENGAN VIDEO) ====== --}}
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8 mb-28">

        {{-- Hiking Card --}}
        <a href="{{ route('destinations.index', ['category' => 'hiking']) }}"
           class="group fade-in-up">
            <div class="relative glass rounded-3xl overflow-hidden
                        shadow-xl hover:shadow-emerald-500/30
                        transition-all duration-300
                        hover:-translate-y-1 hover:scale-[1.03]">

                {{-- Glow Effect --}}
                <div class="absolute inset-0 opacity-0 group-hover:opacity-100
                            bg-gradient-to-br from-emerald-500/10 to-teal-500/10
                            transition-opacity duration-300"></div>

                {{-- Video Container --}}
                <div class="h-64 relative overflow-hidden">
                    <video class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                           autoplay muted loop playsinline preload="metadata">
                        <source src="{{ asset('videos/video1.mp4') }}#t=45" type="video/mp4">
                    </video>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

                    <div class="absolute top-6 right-6 w-14 h-14 glass rounded-xl
                                flex items-center justify-center text-2xl">
                        🥾
                    </div>
                </div>

                <div class="p-8 relative">
                    <h2 class="text-2xl font-black text-white mb-3 group-hover:text-emerald-400 transition">
                        Hiking
                    </h2>
                    <p class="text-neutral-400 mb-6">
                        Perjalanan santai hingga menengah, cocok untuk relaksasi cepat dan pemula.
                    </p>

                    <div class="flex items-center gap-2 text-emerald-400 font-semibold group-hover:gap-4 transition-all">
                        <span>Explore</span>
                        <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </div>
            </div>
        </a>

        {{-- Trekking Card --}}
        <a href="{{ route('destinations.index', ['category' => 'trekking']) }}"
           class="group fade-in-up" style="animation-delay:.1s">
            <div class="relative glass rounded-3xl overflow-hidden
                        shadow-xl hover:shadow-emerald-500/30
                        transition-all duration-300
                        hover:-translate-y-1 hover:scale-[1.03]">

                <div class="h-64 relative overflow-hidden">
                    <video class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                           autoplay muted loop playsinline preload="metadata">
                        <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
                    </video>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

                    <div class="absolute top-6 right-6 w-14 h-14 glass rounded-xl flex items-center justify-center text-2xl">
                        🏔️
                    </div>
                </div>

                <div class="p-8">
                    <h2 class="text-2xl font-black text-white mb-3 group-hover:text-emerald-400 transition">
                        Trekking
                    </h2>
                    <p class="text-neutral-400 mb-6">
                        Ekspedisi multi-hari untuk pengalaman healing mendalam dan penuh tantangan.
                    </p>

                    <div class="flex items-center gap-2 text-emerald-400 font-semibold group-hover:gap-4 transition-all">
                        <span>Explore</span>
                        <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </div>
            </div>
        </a>

        {{-- Camping Card --}}
        <a href="{{ route('destinations.index', ['category' => 'camping']) }}"
           class="group fade-in-up" style="animation-delay:.2s">
            <div class="relative glass rounded-3xl overflow-hidden
                        shadow-xl hover:shadow-emerald-500/30
                        transition-all duration-300
                        hover:-translate-y-1 hover:scale-[1.03]">

                <div class="h-64 relative overflow-hidden">
                    <video class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                           autoplay muted loop playsinline preload="metadata">
                        <source src="{{ asset('videos/video3.mp4') }}" type="video/mp4">
                    </video>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

                    <div class="absolute top-6 right-6 w-14 h-14 glass rounded-xl flex items-center justify-center text-2xl">
                        ⛺
                    </div>
                </div>

                <div class="p-8">
                    <h2 class="text-2xl font-black text-white mb-3 group-hover:text-emerald-400 transition">
                        Camping
                    </h2>
                    <p class="text-neutral-400 mb-6">
                        Menginap di alam terbuka untuk ketenangan dan koneksi dengan alam.
                    </p>

                    <div class="flex items-center gap-2 text-emerald-400 font-semibold group-hover:gap-4 transition-all">
                        <span>Explore</span>
                        <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </div>
                </div>
            </div>
        </a>
    </div>

    {{-- ====== DESTINATION LIST ====== --}}
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($destinations as $destination)
            <div class="group glass rounded-3xl overflow-hidden
                        shadow-xl hover:shadow-emerald-500/30
                        transition-all duration-300
                        hover:-translate-y-1 hover:scale-[1.03] fade-in-up">

                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('storage/'.$destination->image) }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

                    <span class="absolute top-4 right-4 px-4 py-2 text-xs font-bold uppercase
                                 rounded-xl bg-emerald-500/20 text-emerald-400
                                 border border-emerald-500/30 backdrop-blur">
                        {{ $destination->category }}
                    </span>
                </div>

                <div class="p-6">
                    <h3 class="text-xl font-black text-white mb-2">
                        {{ $destination->name }}
                    </h3>

                    <p class="text-neutral-400 text-sm mb-4">
                        {{ Str::limit(strip_tags($destination->description), 90) }}
                    </p>

                    <div class="flex justify-between items-center mb-4">
                        <div class="text-white font-black text-xl">
                            Rp {{ number_format($destination->price,0,',','.') }}
                        </div>
                        <span class="text-neutral-400 text-xs">/ pax</span>
                    </div>

                    <a href="{{ route('destinations.show',$destination->id) }}"
                       class="block w-full py-3 text-center rounded-xl
                              bg-emerald-600 hover:bg-emerald-500
                              text-white font-bold
                              transition-all duration-300
                              shadow-lg hover:shadow-emerald-500/40
                              transform hover:scale-105">
                        Liat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
