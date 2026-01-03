<x-app-layout>

@php
    $desc = $destination->description ?? 'Tidak ada deskripsi.';
    $bgImage = $destination->image
        ? asset("storage/" . $destination->image)
        : 'https://placehold.co/1600x900?text=No+Image';
@endphp

{{-- ===== STYLE TAMBAHAN ===== --}}
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
    background: rgba(255,255,255,.05);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,.1);
}
</style>

{{-- ===== HERO SECTION ===== --}}
<section class="relative h-[60vh] lg:h-[75vh] bg-cover bg-center"
         style="background-image:url('{{ $bgImage }}')">

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-gradient-to-t from-neutral-900 via-neutral-900/60 to-black/40"></div>

    {{-- Content --}}
    <div class="relative z-10 h-full flex flex-col items-center justify-center text-center px-6 fade-in-up">
        <span class="mb-6 px-5 py-2 glass rounded-full text-emerald-400 text-sm font-bold uppercase tracking-wider">
            {{ $destination->category }}
        </span>

        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white max-w-5xl leading-tight drop-shadow-2xl">
            {{ $destination->title }}
        </h1>
    </div>
</section>

{{-- ===== CONTENT WRAPPER ===== --}}
<section class="relative bg-neutral-900 pb-32">
    <div class="max-w-5xl mx-auto px-6 -mt-32 relative z-20 fade-in-up">

        <div class="glass rounded-3xl shadow-2xl overflow-hidden">

            <div class="p-8 md:p-12">

                {{-- PRICE --}}
                <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-8 pb-8 mb-10 border-b border-white/10">
                    <div>
                        <h2 class="text-neutral-400 text-sm uppercase tracking-wider mb-2">
                            Total Biaya Paket
                        </h2>
                        <div class="flex items-end gap-2">
                            <span class="text-4xl md:text-5xl font-black text-emerald-400">
                                Rp {{ number_format($destination->price,0,',','.') }}
                            </span>
                            <span class="text-neutral-400 mb-1">/ pax</span>
                        </div>
                    </div>
                </div>

                {{-- DESCRIPTION --}}
                <div class="prose prose-invert prose-emerald max-w-none text-neutral-300 leading-relaxed text-justify">
                    {!! $desc !!}
                </div>

                {{-- CTA --}}
                <div class="mt-14 glass rounded-2xl p-6 md:p-8 flex flex-col md:flex-row gap-6 items-center justify-between">

                    <div class="text-center md:text-left">
                        <h3 class="text-white font-bold text-lg mb-1">
                            Tertarik dengan destinasi ini?
                        </h3>
                        <p class="text-neutral-400 text-sm">
                            Segera amankan slot petualangan Anda.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                        <a href="{{ url()->previous() }}"
                           class="px-6 py-3.5 rounded-xl w-full sm:w-auto
                                  glass text-white font-bold
                                  hover:bg-white/10 transition-all
                                  flex items-center justify-center">
                            Kembali
                        </a>

                        <a href="https://wa.me/6287863141199?text=Halo%20Admin,%20saya%20tertarik%20dengan%20paket%20{{ urlencode($destination->title) }}"
                           target="_blank"
                           class="px-8 py-3.5 rounded-xl w-full sm:w-auto
                                  bg-emerald-600 hover:bg-emerald-500
                                  text-white font-bold
                                  shadow-xl hover:shadow-emerald-500/40
                                  transition-all transform hover:-translate-y-1
                                  flex items-center justify-center gap-2">
                            <span>Booking WhatsApp</span>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

</x-app-layout>
