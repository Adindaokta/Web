@extends('layouts.app')

@section('content')
<section class="pt-32 pb-24 min-h-screen">
    <div class="max-w-7xl mx-auto px-6">

        @include('components.back-button')

        <div class="grid lg:grid-cols-12 gap-8 items-start">

            {{-- LEFT: IMAGE --}}
            <div class="lg:col-span-6">
                <div class="soft-card rounded-3xl overflow-hidden">
                    <div class="h-[480px] relative">
                        @if(!empty($destination->image))
                            <img src="{{ asset('storage/' . $destination->image) }}"
                                 alt="{{ $destination->title ?? $destination->name }}"
                                 class="w-full h-full object-cover"
                                 onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');">

                            <div class="hidden w-full h-full flex items-center justify-center bg-black/20 text-neutral-400">
                                Gambar tidak ditemukan
                            </div>
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-black/20 text-neutral-400">
                                Gambar tidak tersedia
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>

                        <div class="absolute left-6 bottom-6">
                            <span class="inline-flex px-4 py-2 rounded-full bg-emerald-500/20 backdrop-blur border border-emerald-400/20 text-emerald-300 text-sm font-bold uppercase">
                                {{ $destination->category }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- FACILITIES --}}
                <div class="soft-card rounded-3xl p-7 mt-6">
                    <h2 class="text-2xl font-black text-white mb-4">
                        Fasilitas
                    </h2>

                    <p class="text-neutral-300 leading-relaxed whitespace-pre-line">
                        {{ $destination->facilities ?: 'Fasilitas belum ditambahkan.' }}
                    </p>
                </div>

                {{-- SAFETY NOTES --}}
                <div class="soft-card rounded-3xl p-7 mt-6">
                    <h2 class="text-2xl font-black text-white mb-4">
                        Catatan Keselamatan
                    </h2>

                    <p class="text-neutral-300 leading-relaxed whitespace-pre-line">
                        {{ $destination->safety_notes ?: 'Catatan keselamatan belum ditambahkan.' }}
                    </p>
                </div>
            </div>

            {{-- RIGHT: DETAIL --}}
            <div class="lg:col-span-6">
                <div class="soft-card rounded-3xl p-8">

                    <div class="mb-5">
                        <span class="inline-flex px-4 py-2 rounded-full bg-emerald-500/20 border border-emerald-400/20 text-emerald-300 text-sm font-bold uppercase">
                            {{ $destination->category }}
                        </span>
                    </div>

                    <h1 class="text-4xl md:text-5xl font-black text-white mb-5 leading-tight">
                        {{ $destination->title ?? $destination->name }}
                    </h1>

                    <p class="text-neutral-300 text-lg leading-relaxed mb-8">
                        {{ $destination->description ?? 'Deskripsi destinasi belum tersedia.' }}
                    </p>

                    {{-- PRICE & CATEGORY --}}
                    <div class="grid sm:grid-cols-2 gap-4 mb-6">
                        <div class="rounded-2xl bg-white/5 border border-white/10 p-5">
                            <p class="text-sm text-neutral-400 mb-2">Harga Paket</p>
                            <p class="text-3xl font-black text-emerald-400">
                                Rp {{ number_format($destination->price, 0, ',', '.') }}
                            </p>
                            <p class="text-neutral-500 text-sm mt-1">/ pax</p>
                        </div>

                        <div class="rounded-2xl bg-white/5 border border-white/10 p-5">
                            <p class="text-sm text-neutral-400 mb-2">Tingkat Kesulitan</p>
                            <p class="text-xl font-bold text-white uppercase">
                                {{ $destination->difficulty_level ?? 'Belum diisi' }}
                            </p>
                        </div>
                    </div>

                    {{-- SUMMARY --}}
                    <div class="rounded-2xl bg-white/5 border border-white/10 p-6 mb-8">
                        <h3 class="text-xl font-black text-white mb-5">
                            Ringkasan Destinasi
                        </h3>

                        <div class="grid sm:grid-cols-2 gap-5 text-neutral-300">
                            <div>
                                <p class="text-sm text-neutral-400 mb-1">Lokasi</p>
                                <p class="font-semibold">
                                    {{ $destination->location ?? 'Belum diisi' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-neutral-400 mb-1">Meeting Point</p>
                                <p class="font-semibold">
                                    {{ $destination->meeting_point ?? 'Belum diisi' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-neutral-400 mb-1">Estimasi Durasi</p>
                                <p class="font-semibold">
                                    {{ $destination->estimated_duration ?? 'Belum diisi' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-neutral-400 mb-1">Ketinggian</p>
                                <p class="font-semibold">
                                    @if(!empty($destination->altitude_mdpl))
                                        {{ number_format($destination->altitude_mdpl, 0, ',', '.') }} MDPL
                                    @else
                                        Belum diisi
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- CTA --}}
                    <div class="rounded-2xl bg-white/5 border border-white/10 p-6">
                        <h3 class="text-xl font-black text-white mb-2">
                            Tertarik dengan destinasi ini?
                        </h3>

                        <p class="text-neutral-400 mb-5">
                            Lanjutkan pemesanan dan pilih layanan tambahan seperti ojek, sewa alat, guide, atau dokumentasi jika diperlukan.
                        </p>

                        <div class="flex flex-wrap gap-4">
                            @guest
                                <a href="{{ route('login') }}"
                                   class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold transition">
                                    Login untuk Pesan
                                </a>

                                <a href="{{ route('register') }}"
                                   class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-white/10 hover:bg-white/15 border border-white/10 text-white font-bold transition">
                                    Register
                                </a>
                            @else
                                <a href="{{ route('bookings.create', $destination->id) }}"
                                   class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold transition">
                                    Pesan Sekarang
                                </a>

                                <a href="{{ route('services.index') }}"
                                   class="inline-flex items-center justify-center px-6 py-3 rounded-xl bg-white/10 hover:bg-white/15 border border-white/10 text-white font-bold transition">
                                    Lihat Layanan
                                </a>
                            @endguest
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
