@extends('layouts.app')

@section('content')

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

<div class="min-h-screen bg-neutral-900 py-32">

    <div class="max-w-7xl mx-auto px-6 mb-12">
        <a href="{{ route('activities') }}"
           class="inline-flex items-center gap-2 text-emerald-400 hover:text-emerald-300 font-semibold mb-8">
            ← Kembali ke Adventures
        </a>

        <h1 class="text-4xl md:text-6xl font-black text-white mb-4">
            Paket {{ ucfirst($category) }}
        </h1>

        <p class="text-neutral-400 text-lg">
            Menampilkan semua destinasi berdasarkan kategori {{ ucfirst($category) }}.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        @if($destinations->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($destinations as $destination)
                    <div class="group glass rounded-3xl overflow-hidden shadow-xl hover:shadow-emerald-500/30 transition-all duration-300 hover:-translate-y-1 hover:scale-[1.03] fade-in-up">

                        <div class="relative h-64 overflow-hidden bg-neutral-800">
                            @if($destination->image)
                                <img src="{{ asset('storage/' . $destination->image) }}"
                                     alt="{{ $destination->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">

                                <div class="hidden w-full h-full items-center justify-center bg-neutral-800 text-neutral-500 text-sm">
                                    Gambar tidak ditemukan
                                </div>
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-neutral-800 text-neutral-500 text-sm">
                                    Tidak ada gambar
                                </div>
                            @endif

                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

                            <span class="absolute top-4 right-4 px-4 py-2 text-xs font-bold uppercase rounded-xl bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 backdrop-blur">
                                {{ $destination->category }}
                            </span>
                        </div>

                        <div class="p-6">
                            <h3 class="text-xl font-black text-white mb-2">
                                {{ $destination->title }}
                            </h3>

                            <p class="text-neutral-400 text-sm mb-4">
                                {{ Str::limit(strip_tags($destination->description), 90) }}
                            </p>

                            <div class="flex justify-between items-center mb-4">
                                <div class="text-white font-black text-xl">
                                    Rp {{ number_format($destination->price, 0, ',', '.') }}
                                </div>
                                <span class="text-neutral-400 text-xs">/ pax</span>
                            </div>

                            <a href="{{ route('destinations.show', $destination->id) }}"
                               class="block w-full py-3 text-center rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold transition-all duration-300 shadow-lg hover:shadow-emerald-500/40 transform hover:scale-105">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="glass rounded-3xl p-12 text-center">
                <h3 class="text-2xl font-bold text-white mb-3">
                    Belum ada destinasi {{ ucfirst($category) }}
                </h3>

                <p class="text-neutral-400">
                    Data destinasi untuk kategori ini belum tersedia.
                </p>
            </div>
        @endif
    </div>

</div>

@endsection
