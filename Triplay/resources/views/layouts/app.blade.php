<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Triplay Healing - Premium Nature Adventure</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { font-family: 'Inter', sans-serif; }

        /* FIX RESPONSIVE: Mencegah scroll horizontal yang bikin berantakan */
        html, body {
            max-width: 100vw;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            position: relative;
        }

        @keyframes parallaxMove {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .parallax-float {
            animation: parallaxMove 6s ease-in-out infinite;
        }

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

        .text-shadow-xl {
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .glass-morphism {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .video-container {
            position: relative;
            overflow: hidden;
            width: 100%; /* Pastikan video tidak meluber */
        }

        .video-container::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(6, 78, 59, 0.4), rgba(13, 148, 136, 0.3));
            z-index: 1;
        }

        .nav-blur {
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
        }

        /* Memastikan gambar dan video tidak pernah meluber */
        img, video {
            max-width: 100%;
            height: auto;
        }

          h1, h2, h3, p {
            overflow-wrap: break-word;
            word-break: break-word;
        }
    </style>
</head>
<body class="antialiased bg-neutral-900">

    <nav class="fixed w-full top-0 z-50 nav-blur bg-neutral-900/80 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 md:h-20">
                <a href="{{ url('/') }}" class="flex items-center gap-2 sm:gap-3 group shrink-0">
                    <div class="relative w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-emerald-400 to-teal-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 sm:w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <span class="text-lg md:text-xl font-bold text-white tracking-tight">Triplay<span class="text-emerald-400">.</span></span>
                </a>

                <div class="hidden lg:flex items-center gap-6">
                    <a href="#home" class="text-sm text-neutral-300 hover:text-white transition font-medium">Home</a>
                    <a href="activities" class="text-sm text-neutral-300 hover:text-white transition font-medium">Adventures</a>
                    <a href="#about" class="text-sm text-neutral-300 hover:text-white transition font-medium">About</a>
                    <a href="#contact" class="text-sm text-neutral-300 hover:text-white transition font-medium">Contact</a>
                </div>

                <div class="flex items-center gap-2 sm:gap-4">
                    @auth
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center gap-2 px-2 py-1 sm:px-3 sm:py-1.5 glass-morphism rounded-full hover:bg-white/10 transition">
                                <div class="w-6 h-6 sm:w-8 sm:h-8 bg-emerald-500 rounded-full flex items-center justify-center text-[10px] sm:text-xs font-bold text-white uppercase shrink-0">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="hidden sm:block text-xs font-medium text-white truncate max-w-[100px]">{{ Auth::user()->name }}</span>
                            </button>
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-neutral-800 border border-white/10 rounded-xl shadow-xl z-50">
                                <a href="{{ url('/profile') }}" class="block px-4 py-2 text-sm text-neutral-200 hover:bg-white/5">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-red-500/10">Logout</button>
                                </form>
                            </div>
                        </div>
                    @endauth

                    <button id="menu-toggle" class="lg:hidden text-white p-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden lg:hidden bg-neutral-900 border-t border-white/5 px-6 py-6 space-y-4">
            <a href="#home" class="block text-neutral-300 hover:text-emerald-400 transition">Home</a>
            <a href="activities" class="block text-neutral-300 hover:text-emerald-400 transition">Adventures</a>
            <a href="#about" class="block text-neutral-300 hover:text-emerald-400 transition">About</a>
            <a href="#contact" class="block text-neutral-300 hover:text-emerald-400 transition">Contact</a>
        </div>
    </nav>

    <main class="w-full">
        @yield('content')
    </main>

    <footer class="py-12 bg-neutral-900 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-teal-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-white">Triplay<span class="text-emerald-400">.</span></span>
                </div>

                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 bg-neutral-800 hover:bg-neutral-700 border border-white/5 rounded-lg flex items-center justify-center transition">
                        <i class="fab fa-facebook-f text-neutral-400"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-neutral-800 hover:bg-neutral-700 border border-white/5 rounded-lg flex items-center justify-center transition">
                        <i class="fab fa-instagram text-neutral-400"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-neutral-800 hover:bg-neutral-700 border border-white/5 rounded-lg flex items-center justify-center transition">
                        <i class="fab fa-whatsapp text-neutral-400"></i>
                    </a>
                </div>

                <p class="text-sm text-neutral-500 text-center md:text-right">&copy; {{ date('Y') }} Triplay. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
    // 1. Mobile Menu Toggle
    document.getElementById('menu-toggle').addEventListener('click', () => {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    // 2. Smooth Scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
                document.getElementById('mobile-menu').classList.add('hidden');
            }
        });
    });

    // 3. Video Slider Logic (Tetap Aman)
    let currentVideoIndex = 0;
    const videoItems = document.querySelectorAll('.video-item');
    const videoIndicators = document.querySelectorAll('.video-indicator');
    const videos = document.querySelectorAll('.video-item video');

    if(videoItems.length > 0) {
        async function changeVideo(index) {
            videoItems[currentVideoIndex].classList.replace('opacity-100', 'opacity-0');
            videoIndicators[currentVideoIndex].classList.replace('bg-white', 'bg-white/30');
            videos[currentVideoIndex].pause();

            currentVideoIndex = index;

            videoItems[currentVideoIndex].classList.replace('opacity-0', 'opacity-100');
            videoIndicators[currentVideoIndex].classList.replace('bg-white/30', 'bg-white');

            try {
                await videos[currentVideoIndex].play();
            } catch (err) { }
        }

        setInterval(() => {
            let nextIndex = (currentVideoIndex + 1) % videoItems.length;
            changeVideo(nextIndex);
        }, 6000);
    }

    // 4. Set Time 45s
    window.addEventListener('load', function() {
        if(videos.length > 0) {
            const firstVideo = videos[0];
            if (firstVideo.readyState >= 1) {
                firstVideo.currentTime = 45;
            } else {
                firstVideo.addEventListener('loadedmetadata', function() {
                    this.currentTime = 45;
                }, { once: true });
            }
        }
    });
    </script>
</body>
</html>
