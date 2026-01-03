@extends('layouts.app')

@section('content')

{{-- ===== ANIMATION & GLASS STYLE ===== --}}
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
    animation: fadeInUp .8s ease-out forwards;
}

.glass {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}
</style>

<div class="min-h-screen bg-neutral-900 py-32">

    {{-- ===== HEADER ===== --}}
    <div class="max-w-7xl mx-auto px-6 text-center mb-20 fade-in-up">
        <div class="inline-block mb-6 px-5 py-2 glass rounded-full">
            <span class="text-emerald-400 text-sm font-semibold uppercase tracking-wider">
                Kegiatan
            </span>
        </div>

        <h1 class="text-5xl md:text-6xl font-black text-white mb-6">
            {{ ucfirst($category) }}
            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">
                Adventure
            </span>
        </h1>

        <p class="text-neutral-400 max-w-3xl mx-auto text-lg">
            Jelajahi petualangan {{ strtolower($category) }} terbaik kami.
            Temukan pengalaman healing yang menyatu dengan alam dan ketenangan.
        </p>
    </div>

    {{-- ===== EMPTY STATE ===== --}}
    @if($destinations->isEmpty())
        <div class="text-center text-neutral-500 italic fade-in-up">
            Belum ada data destinasi untuk kategori ini.
        </div>
    @else

    {{-- ===== DESTINATION CARDS ===== --}}
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($destinations as $destination)
        <div class="group glass rounded-3xl overflow-hidden
                    shadow-xl hover:shadow-emerald-500/30
                    transition-all duration-300
                    hover:-translate-y-1 hover:scale-[1.03]
                    fade-in-up">

            {{-- IMAGE --}}
            <div class="relative h-64 overflow-hidden">
                <img src="{{ asset('storage/' . $destination->image) }}"
                     alt="{{ $destination->title }}"
                     class="w-full h-full object-cover
                            transition-transform duration-700
                            group-hover:scale-110">

                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

                {{-- CATEGORY BADGE --}}
                <span class="absolute top-4 right-4 px-4 py-1 text-xs font-bold uppercase
                             rounded-xl bg-emerald-500/20 text-emerald-400
                             border border-emerald-500/30 backdrop-blur">
                    {{ $category }}
                </span>
            </div>

            {{-- CONTENT --}}
            <div class="p-6">
                <h2 class="text-xl font-black text-white mb-2">
                    {{ $destination->title ?? 'Nama Tidak Tersedia' }}
                </h2>

                <p class="text-neutral-400 text-sm mb-4 line-clamp-2">
                    {{ $destination->description }}
                </p>

                <div class="flex items-center gap-2 text-neutral-400 text-sm mb-5">
                    <i class="fa-solid fa-location-dot text-emerald-400"></i>
                    <span>{{ $destination->location }}</span>
                </div>

                <a href="{{ route('destinations.show', $destination->id) }}"
                   class="block w-full py-3 text-center rounded-xl
                          bg-emerald-600 hover:bg-emerald-500
                          text-white font-bold
                          transition-all duration-300
                          shadow-lg hover:shadow-emerald-500/40
                          transform hover:scale-105">
                    Lihat Detail
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>
@endsection
