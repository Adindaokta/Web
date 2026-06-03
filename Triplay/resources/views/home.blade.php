@extends('layouts.app')

@section('content')

{{-- HERO --}}
<section id="home" class="scroll-mt-24 min-h-screen flex items-center pt-28 pb-20">
    <div class="max-w-7xl mx-auto px-6 w-full">
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-500/10 border border-emerald-400/20 text-emerald-300 text-sm font-semibold mb-6">
                Nature Healing Experience
            </span>

            <h1 class="text-4xl md:text-6xl font-black text-white leading-tight mb-6">
                Temukan
                <span class="text-emerald-400">Petualangan Healing</span>
                Favoritmu
            </h1>

            <p class="text-neutral-300 text-lg leading-relaxed mb-8 max-w-2xl">
                Jelajahi destinasi hiking, trekking, dan camping dengan pengalaman yang lebih rapi,
                nyaman, dan mudah dipesan langsung dari website.
            </p>

            <div class="flex flex-wrap gap-4">
                @guest
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center justify-center px-8 py-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold transition shadow-lg hover:shadow-emerald-500/30">
                        Jelajahi Paket
                    </a>
                @else
                    <a href="{{ route('explore') }}"
                       class="inline-flex items-center justify-center px-8 py-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold transition shadow-lg hover:shadow-emerald-500/30">
                        Jelajahi Paket
                    </a>
                @endguest

                <a href="#contact"
                   class="inline-flex items-center justify-center px-8 py-4 rounded-xl bg-white/10 hover:bg-white/15 border border-white/10 text-white font-bold transition">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ADVENTURE CATEGORIES --}}
{{-- ADVENTURE --}}
<section id="adventure" class="scroll-mt-24 py-24 section-divider">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-500/10 border border-emerald-400/20 text-emerald-300 text-sm font-semibold mb-4">
                OUR ADVENTURES
            </span>

            <h2 class="text-4xl md:text-5xl font-black text-white mb-4">
                Pilih Jenis Petualangan
                <span class="block text-emerald-400">Terbaikmu</span>
            </h2>

            <p class="text-neutral-400 text-lg">
                Pilih kategori perjalanan yang sesuai, lalu jelajahi paket lengkapnya di halaman activities.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">

            {{-- Hiking --}}
            <div class="soft-card rounded-3xl overflow-hidden transition duration-300 hover:-translate-y-1">
                <div class="h-72 relative overflow-hidden">
                    <video class="w-full h-full object-cover"
                           autoplay muted loop playsinline preload="metadata">
                        <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
                    </video>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                    <div class="absolute top-5 right-5 w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-md border border-white/10 flex items-center justify-center text-2xl">
                        🥾
                    </div>

                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-3xl font-black text-white">Hiking</h3>
                    </div>
                </div>
            </div>

            {{-- Trekking --}}
            <div class="soft-card rounded-3xl overflow-hidden transition duration-300 hover:-translate-y-1">
                <div class="h-72 relative overflow-hidden">
                    <video class="w-full h-full object-cover"
                           autoplay muted loop playsinline preload="metadata">
                        <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
                    </video>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                    <div class="absolute top-5 right-5 w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-md border border-white/10 flex items-center justify-center text-2xl">
                        ⛰️
                    </div>

                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-3xl font-black text-white">Trekking</h3>
                    </div>
                </div>
            </div>

            {{-- Camping --}}
            <div class="soft-card rounded-3xl overflow-hidden transition duration-300 hover:-translate-y-1">
                <div class="h-72 relative overflow-hidden">
                    <video class="w-full h-full object-cover"
                           autoplay muted loop playsinline preload="metadata">
                        <source src="{{ asset('videos/video3.mp4') }}" type="video/mp4">
                    </video>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                    <div class="absolute top-5 right-5 w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-md border border-white/10 flex items-center justify-center text-2xl">
                        ⛺
                    </div>

                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-3xl font-black text-white">Camping</h3>
                    </div>
                </div>
            </div>

        </div>

        <div class="text-center">
            <a href="{{ route('explore') }}"
               class="inline-flex items-center justify-center px-8 py-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold transition shadow-lg hover:shadow-emerald-500/30">
                Explore Activities
            </a>
        </div>

    </div>
</section>

{{-- SERVICES --}}
<section id="services" class="scroll-mt-24 py-24 section-divider">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-500/10 border border-emerald-400/20 text-emerald-300 text-sm font-semibold mb-4">
                SERVICES
            </span>

            <h2 class="text-4xl md:text-5xl font-black text-white mb-4">
                Layanan Tambahan untuk
                <span class="text-emerald-400">Trip Lebih Nyaman</span>
            </h2>

            <p class="text-neutral-400 text-lg">
                Tambahkan layanan pendukung seperti ojek, perlengkapan, guide, dan dokumentasi sesuai kebutuhan perjalananmu.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="soft-card rounded-3xl p-6 group hover:-translate-y-1 transition">
                <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-2xl mb-6">
                    🛵
                </div>
                <h3 class="text-xl font-black text-white mb-3">Ojek</h3>
                <p class="text-neutral-400 text-sm leading-relaxed mb-6">
                    Transport lokal untuk membantu perjalanan menuju titik keberangkatan atau meeting point.
                </p>
            </div>

            <div class="soft-card rounded-3xl p-6 group hover:-translate-y-1 transition">
                <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-2xl mb-6">
                    🎒
                </div>
                <h3 class="text-xl font-black text-white mb-3">Sewa Perlengkapan</h3>
                <p class="text-neutral-400 text-sm leading-relaxed mb-6">
                    Perlengkapan trip seperti carrier, matras, sleeping bag, jas hujan, dan kebutuhan outdoor.
                </p>
            </div>

            <div class="soft-card rounded-3xl p-6 group hover:-translate-y-1 transition">
                <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-2xl mb-6">
                    🧭
                </div>
                <h3 class="text-xl font-black text-white mb-3">Guide</h3>
                <p class="text-neutral-400 text-sm leading-relaxed mb-6">
                    Pemandu perjalanan untuk membantu rute, arahan teknis, dan keselamatan selama trip.
                </p>
            </div>

            <div class="soft-card rounded-3xl p-6 group hover:-translate-y-1 transition">
                <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 flex items-center justify-center text-2xl mb-6">
                    📷
                </div>
                <h3 class="text-xl font-black text-white mb-3">Dokumentasi</h3>
                <p class="text-neutral-400 text-sm leading-relaxed mb-6">
                    Layanan foto atau video agar momen perjalanan tetap tersimpan dengan rapi.
                </p>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('services.index') }}"
               class="inline-flex items-center justify-center px-8 py-4 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold transition shadow-lg hover:shadow-emerald-500/30">
                Lihat Semua Layanan
            </a>
        </div>
    </div>
</section>

{{-- ABOUT --}}
<section id="about" class="scroll-mt-24 py-24 section-divider">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-500/10 border border-emerald-400/20 text-emerald-300 text-sm font-semibold mb-4">
                    ABOUT TRIPLAY
                </span>

                <h2 class="text-4xl md:text-5xl font-black text-white mb-6">
                    Platform untuk Menikmati
                    <span class="text-emerald-400">Healing Trip</span>
                    yang Lebih Praktis
                </h2>

                <p class="text-neutral-400 text-lg leading-relaxed mb-6">
                    Triplay hadir untuk membantu pengguna menemukan destinasi, melihat detail paket,
                    dan melakukan pemesanan secara lebih rapi tanpa harus berpindah-pindah platform.
                </p>

                <p class="text-neutral-400 text-lg leading-relaxed">
                    Ke depannya website ini akan mendukung pemesanan terintegrasi, layanan tambahan,
                    riwayat transaksi, saldo pengguna, hingga dashboard admin untuk monitoring bisnis.
                </p>
            </div>

            <div class="soft-card rounded-3xl p-8">
                <div class="grid grid-cols-2 gap-6">
                    <div class="rounded-2xl bg-white/5 p-6">
                        <div class="text-3xl font-black text-emerald-400 mb-2">3+</div>
                        <div class="text-neutral-400">Kategori Petualangan</div>
                    </div>

                    <div class="rounded-2xl bg-white/5 p-6">
                        <div class="text-3xl font-black text-emerald-400 mb-2">24/7</div>
                        <div class="text-neutral-400">Akses Informasi</div>
                    </div>

                    <div class="rounded-2xl bg-white/5 p-6">
                        <div class="text-3xl font-black text-emerald-400 mb-2">Easy</div>
                        <div class="text-neutral-400">Booking Flow</div>
                    </div>

                    <div class="rounded-2xl bg-white/5 p-6">
                        <div class="text-3xl font-black text-emerald-400 mb-2">Future</div>
                        <div class="text-neutral-400">Payment & Wallet</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CONTACT --}}
<section id="contact" class="scroll-mt-24 py-24 section-divider">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-500/10 border border-emerald-400/20 text-emerald-300 text-sm font-semibold mb-4">
                CONTACT
            </span>

            <h2 class="text-4xl md:text-5xl font-black text-white mb-4">
                Hubungi dan Ikuti
                <span class="text-emerald-400">Triplay</span>
            </h2>

            <p class="text-neutral-400 text-lg leading-relaxed">
                Informasi kontak, sosial media, layanan, dan partner pembayaran Triplay
                dalam satu tempat agar pengguna lebih mudah mendapatkan bantuan.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-14">

            {{-- BRAND + PAYMENT --}}
            <div class="space-y-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-600 flex items-center justify-center text-white font-black text-xl">
                            T
                        </div>

                        <div>
                            <h3 class="text-3xl font-black text-white leading-none">
                                Triplay.
                            </h3>
                            <p class="text-neutral-500 text-sm mt-1">
                                Healing Trip
                            </p>
                        </div>
                    </div>

                    <p class="text-neutral-400 text-sm leading-relaxed">
                        Platform booking trip dan layanan pendukung perjalanan seperti
                        ojek, sewa perlengkapan, guide, dan dokumentasi.
                    </p>
                </div>

                <a href="https://wa.me/6281234567890"
                   target="_blank"
                   class="inline-flex items-center justify-center px-6 py-3 rounded-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold transition shadow-lg hover:shadow-emerald-500/30">
                    Hubungi Tim Triplay
                </a>

                <div>
                    <h4 class="text-white font-black text-lg mb-4">
                        Partner Pembayaran
                    </h4>

                    <div class="grid grid-cols-3 gap-3">
                        <div class="rounded-xl bg-white/5 border border-white/10 px-3 py-3 text-center text-white text-xs font-bold">
                            BCA
                        </div>
                        <div class="rounded-xl bg-white/5 border border-white/10 px-3 py-3 text-center text-white text-xs font-bold">
                            BRI
                        </div>
                        <div class="rounded-xl bg-white/5 border border-white/10 px-3 py-3 text-center text-white text-xs font-bold">
                            BNI
                        </div>
                        <div class="rounded-xl bg-white/5 border border-white/10 px-3 py-3 text-center text-white text-xs font-bold">
                            Mandiri
                        </div>
                        <div class="rounded-xl bg-white/5 border border-white/10 px-3 py-3 text-center text-white text-xs font-bold">
                            GoPay
                        </div>
                        <div class="rounded-xl bg-white/5 border border-white/10 px-3 py-3 text-center text-white text-xs font-bold">
                            QRIS
                        </div>
                    </div>
                </div>
            </div>

            {{-- TENTANG --}}
            <div>
                <h4 class="text-white font-black text-xl mb-5">
                    Tentang Triplay
                </h4>

                <ul class="space-y-4 text-neutral-400 text-sm">
                    <li>
                        <a href="#home" class="hover:text-emerald-400 transition">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="#about" class="hover:text-emerald-400 transition">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="#services" class="hover:text-emerald-400 transition">
                            Layanan
                        </a>
                    </li>
                    <li>
                        <a href="#contact" class="hover:text-emerald-400 transition">
                            Hubungi Kami
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-emerald-400 transition">
                            Cara Booking
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-emerald-400 transition">
                            Pusat Bantuan
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-emerald-400 transition">
                            Syarat & Ketentuan
                        </a>
                    </li>
                </ul>
            </div>

            {{-- LAYANAN --}}
            <div>
                <h4 class="text-white font-black text-xl mb-5">
                    Layanan
                </h4>

                <ul class="space-y-4 text-neutral-400 text-sm">
                    <li>
                        <a href="{{ route('explore') }}" class="hover:text-emerald-400 transition">
                            Adventure
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="hover:text-emerald-400 transition">
                            Semua Services
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="hover:text-emerald-400 transition">
                            Ojek
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="hover:text-emerald-400 transition">
                            Sewa Perlengkapan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="hover:text-emerald-400 transition">
                            Guide
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="hover:text-emerald-400 transition">
                            Dokumentasi
                        </a>
                    </li>
                </ul>
            </div>

            {{-- SOSIAL + KONTAK --}}
            <div>
                <h4 class="text-white font-black text-xl mb-5">
                    Terhubung dengan Kami
                </h4>

                <ul class="space-y-4 text-neutral-400 text-sm mb-8">
                    <li>
                        <a href="https://wa.me/6281234567890"
                           target="_blank"
                           class="flex items-center gap-3 hover:text-emerald-400 transition">
                            <span class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white text-xs font-bold">
                                WA
                            </span>
                            <span>+62 812-3456-7890</span>
                        </a>
                    </li>

                    <li>
                        <a href="mailto:hello@triplay.com"
                           class="flex items-center gap-3 hover:text-emerald-400 transition">
                            <span class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white text-xs font-bold">
                                @
                            </span>
                            <span>hello@triplay.com</span>
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           target="_blank"
                           class="flex items-center gap-3 hover:text-emerald-400 transition">
                            <span class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white text-xs font-bold">
                                IG
                            </span>
                            <span>@triplay.id</span>
                        </a>
                    </li>

                    <li>
                        <a href="#"
                           target="_blank"
                           class="flex items-center gap-3 hover:text-emerald-400 transition">
                            <span class="w-9 h-9 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center text-white text-xs font-bold">
                                FB
                            </span>
                            <span>Triplay Indonesia</span>
                        </a>
                    </li>
                </ul>

                <h4 class="text-white font-black text-lg mb-4">
                    Follow kami
                </h4>

                <div class="flex flex-wrap gap-3">
                    <a href="#"
                       class="w-11 h-11 rounded-full bg-white/5 hover:bg-emerald-600 border border-white/10 text-white flex items-center justify-center transition">
                        f
                    </a>

                    <a href="#"
                       class="w-11 h-11 rounded-full bg-white/5 hover:bg-emerald-600 border border-white/10 text-white flex items-center justify-center transition">
                        ig
                    </a>

                    <a href="#"
                       class="w-11 h-11 rounded-full bg-white/5 hover:bg-emerald-600 border border-white/10 text-white flex items-center justify-center transition">
                        x
                    </a>

                    <a href="#"
                       class="w-11 h-11 rounded-full bg-white/5 hover:bg-emerald-600 border border-white/10 text-white flex items-center justify-center transition">
                        t
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
