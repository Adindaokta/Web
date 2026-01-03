@extends('layouts.app')

@section('content')


    <!-- Hero Section -->
    <section id="home" class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image with Parallax -->
        <div class="absolute inset-0 scale-105 parallax-float">
            <img src="{{ asset('images/hero-bg.jpg') }}" alt="Mountain landscape" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-neutral-900/60 via-neutral-900/40 to-neutral-900/80"></div>
        </div>

        <!-- Floating Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-teal-500/10 rounded-full blur-3xl"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in-up">
            <div class="inline-block mb-6 px-4 py-2 glass-morphism rounded-full">
                <span class="text-emerald-400 text-xs sm:text-sm font-semibold tracking-wider uppercase break-words">Premium Nature Experience</span>
            </div>

            <h1 class="text-3xl sm:text-4xl md:text-6xl lg:text-8xl font-black text-white mb-6 leading-tight break-words text-shadow-xl">
                Escape to<br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-teal-400 to-cyan-400">
                    Nature's Embrace
                </span>
            </h1>

            <p class="text-base sm:text-lg md:text-2xl text-neutral-300 max-w-3xl mx-auto mb-12 leading-relaxed break-words">
                Reconnect with yourself through curated mountain adventures and immersive healing experiences
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap gap-4 justify-center items-center mb-16 px-4">
                <a href="#activities" class="w-full md:w-auto group px-8 py-4 bg-emerald-600 hover:bg-emerald-500 text-white font-semibold rounded-lg transition-all transform hover:scale-105 shadow-xl hover:shadow-emerald-500/50">
                    <span class="flex items-center gap-2">
                        Explore Adventures
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </span>
                </a>
                <a href="#about" class="w-full md:w-auto px-8 py-4 glass-morphism hover:bg-white/10 text-white font-semibold rounded-lg transition-all">
                    Learn More
                </a>
            </div>

            <!-- Categories -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 px-4">
                <a href="{{ route('destinations.index', ['category' => 'hiking']) }}" class="group">
                    <div class="glass-morphism px-6 py-4 rounded-xl hover:bg-white/10 transition-all">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-emerald-500/20 rounded-lg flex items-center justify-center group-hover:bg-emerald-500/30 transition">
                                <i class="fas fa-hiking text-emerald-400 text-xl"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-white font-semibold">Hiking</div>
                                <div class="text-neutral-400 text-xs">Trail Adventures</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('destinations.index', ['category' => 'trekking']) }}" class="group">
                    <div class="glass-morphism px-6 py-4 rounded-xl hover:bg-white/10 transition-all">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center group-hover:bg-blue-500/30 transition">
                                <i class="fas fa-mountain text-blue-400 text-xl"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-white font-semibold">Trekking</div>
                                <div class="text-neutral-400 text-xs">Peak Expeditions</div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('destinations.index', ['category' => 'camping']) }}" class="group">
                    <div class="glass-morphism px-6 py-4 rounded-xl hover:bg-white/10 transition-all">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-amber-500/20 rounded-lg flex items-center justify-center group-hover:bg-amber-500/30 transition">
                                <i class="fas fa-campground text-amber-400 text-xl"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-white font-semibold">Camping</div>
                                <div class="text-neutral-400 text-xs">Wilderness Stays</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center p-2">
                <div class="w-1 h-2 bg-white/50 rounded-full"></div>
            </div>
        </div>
    </section>

    <!-- Activities Section with Video -->
    <section id="activities" class="relative py-32 overflow-hidden">
        <!-- Video Background -->
        <div class="video-container absolute inset-0">
            <div class="video-item absolute inset-0 opacity-100 transition-opacity duration-1000">
                <video class="w-full h-full object-cover"autoplay muted loop playsinline preload="metadata">
                    <source src="{{ asset('videos/video1.mp4') }}#t=45" type="video/mp4">
                </video>
            </div>
            <div class="video-item absolute inset-0 opacity-0 transition-opacity duration-1000">
                <video class="w-full h-full object-cover" autoplay muted loop playsinline preload="metadata">
                    <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
                </video>
            </div>
            <div class="video-item absolute inset-0 opacity-0 transition-opacity duration-1000">
                <video class="w-full h-full object-cover" autoplay muted loop playsinline preload="metadata">
                    <source src="{{ asset('videos/video3.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
            <div class="inline-block mb-6 px-4 py-2 glass-morphism rounded-full">
                <span class="text-emerald-400 text-sm font-semibold tracking-wider uppercase">Our Activities</span>
            </div>

            <h2 class="text-5xl md:text-7xl font-black text-white mb-6 text-shadow-xl">
                Mountain & Land<br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">Adventures</span>
            </h2>

            <p class="text-xl text-neutral-200 max-w-2xl mx-auto mb-12">
                Discover authentic adventures nestled between nature and mountains with our premium healing services
            </p>

            <!-- Video Controls -->
            <div class="flex justify-center gap-2 mb-12">
                <button onclick="changeVideo(0)" class="video-indicator w-12 h-1 bg-white rounded-full transition-all"></button>
                <button onclick="changeVideo(1)" class="video-indicator w-12 h-1 bg-white/30 hover:bg-white/50 rounded-full transition-all"></button>
                <button onclick="changeVideo(2)" class="video-indicator w-12 h-1 bg-white/30 hover:bg-white/50 rounded-full transition-all"></button>
            </div>

            @guest
                <a href="{{ route('login') }}" class="inline-block px-8 py-4 bg-white hover:bg-neutral-100 text-neutral-900 font-bold rounded-lg transition-all transform hover:scale-105 shadow-2xl">
                    View All Activities
                </a>
            @else
                <a href="{{ route('activities') }}" class="inline-block px-8 py-4 bg-white hover:bg-neutral-100 text-neutral-900 font-bold rounded-lg transition-all transform hover:scale-105 shadow-2xl">
                    View All Activities
                </a>
            @endauth
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-32 bg-neutral-900">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <div class="inline-block mb-6 px-4 py-2 bg-emerald-500/10 border border-emerald-500/20 rounded-full">
                    <span class="text-emerald-400 text-sm font-semibold tracking-wider uppercase">Why Choose Us</span>
                </div>
                <h2 class="text-5xl md:text-6xl font-black text-white mb-6">
                    Experience Excellence
                </h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="group p-8 bg-neutral-800/50 hover:bg-neutral-800 border border-white/5 rounded-2xl transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Expert Guidance</h3>
                    <p class="text-neutral-400 leading-relaxed">Professional guides with years of experience ensuring your safety and enjoyment throughout the journey</p>
                </div>

                <div class="group p-8 bg-neutral-800/50 hover:bg-neutral-800 border border-white/5 rounded-2xl transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-map-marked-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Premium Locations</h3>
                    <p class="text-neutral-400 leading-relaxed">Carefully curated destinations offering breathtaking views and unforgettable experiences</p>
                </div>

                <div class="group p-8 bg-neutral-800/50 hover:bg-neutral-800 border border-white/5 rounded-2xl transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-4">Healing Focus</h3>
                    <p class="text-neutral-400 leading-relaxed">Designed for mental wellness and spiritual rejuvenation through nature immersion</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-32 bg-gradient-to-b from-neutral-900 to-neutral-800">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <div class="inline-block mb-6 px-4 py-2 bg-emerald-500/10 border border-emerald-500/20 rounded-full">
                <span class="text-emerald-400 text-sm font-semibold tracking-wider uppercase">About Us</span>
            </div>
            <h2 class="text-5xl md:text-6xl font-black text-white mb-8">
                Nature Healing<br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">Community</span>
            </h2>
            <p class="text-xl text-neutral-300 leading-relaxed mb-12">
                Triplay Healing is a premium community of nature enthusiasts focused on authentic healing experiences.
                We believe nature's beauty can heal the soul and reignite the spirit of life.
            </p>

            <div class="grid grid-cols-3 gap-8 max-w-3xl mx-auto">
                <div class="p-6 bg-neutral-800/50 border border-white/5 rounded-2xl">
                    <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-emerald-400 to-teal-600 mb-2">100+</div>
                    <div class="text-sm text-neutral-400 font-medium">Destinations</div>
                </div>
                <div class="p-6 bg-neutral-800/50 border border-white/5 rounded-2xl">
                    <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-emerald-400 to-teal-600 mb-2">500+</div>
                    <div class="text-sm text-neutral-400 font-medium">Travelers</div>
                </div>
                <div class="p-6 bg-neutral-800/50 border border-white/5 rounded-2xl">
                    <div class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-br from-emerald-400 to-teal-600 mb-2">5.0</div>
                    <div class="text-sm text-neutral-400 font-medium">Rating</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-32 bg-neutral-800">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <div class="inline-block mb-6 px-4 py-2 bg-emerald-500/10 border border-emerald-500/20 rounded-full">
                <span class="text-emerald-400 text-sm font-semibold tracking-wider uppercase">Get in Touch</span>
            </div>
            <h2 class="text-5xl md:text-6xl font-black text-white mb-6">Let's Connect</h2>
            <p class="text-xl text-neutral-300 mb-12">
                Ready to start your healing journey? Contact us for reservations or inquiries
            </p>

            <div class="grid md:grid-cols-2 gap-6">
                <a href="mailto:triplayhealing@gmail.com" class="group p-6 bg-neutral-700/50 hover:bg-neutral-700 border border-white/5 rounded-2xl transition-all">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="w-14 h-14 bg-emerald-500/20 rounded-xl flex items-center justify-center group-hover:bg-emerald-500/30 transition">
                            <i class="fas fa-envelope text-emerald-400 text-xl"></i>
                        </div>
                        <div class="text-left">
                            <div class="text-xs text-neutral-400 mb-1">Email</div>
                            <div class="font-bold text-white break-all sm:break-words">triplayhealing@gmail.com</div>
                        </div>
                    </div>
                </a>

                <a href="tel:+6281234567890" class="group p-6 bg-neutral-700/50 hover:bg-neutral-700 border border-white/5 rounded-2xl transition-all">
                    <div class="flex flex-wrap items-center gap-4">
                        <div class="w-14 h-14 bg-emerald-500/20 rounded-xl flex items-center justify-center group-hover:bg-emerald-500/30 transition">
                            <i class="fas fa-phone text-emerald-400 text-xl"></i>
                        </div>
                        <div class="text-left">
                            <div class="text-xs text-neutral-400 mb-1">Phone</div>
                            <div class="font-bold text-white break-words">+62 878 6314 1199</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>


@endsection


