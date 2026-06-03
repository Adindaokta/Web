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
        * {
            font-family: 'Inter', sans-serif;
        }

        html,
        body {
            max-width: 100vw;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            background: #0a0a0a;
        }

        .fixed-page-bg {
            background-attachment: fixed;
        }

        @media (max-width: 768px) {
            .fixed-page-bg {
                background-attachment: scroll;
            }
        }

        .page-overlay {
            background: rgba(10, 10, 10, 0.78);
        }

        .soft-card {
            background: rgba(23, 23, 23, 0.78);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.10);
        }

        .soft-card:hover {
            border-color: rgba(16, 185, 129, 0.45);
            background: rgba(23, 23, 23, 0.86);
        }

        .glass-morphism {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.10);
        }

        .section-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        .text-shadow-xl {
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        img,
        video {
            max-width: 100%;
        }

        h1,
        h2,
        h3,
        p {
            overflow-wrap: break-word;
            word-break: break-word;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="antialiased text-white">

    <div class="relative min-h-screen bg-cover bg-center bg-no-repeat fixed-page-bg"
         style="background-image: url('{{ asset('images/hero-bg.jpg') }}')">

        <div class="fixed inset-0 page-overlay pointer-events-none"></div>

        <div class="relative z-10 min-h-screen flex flex-col">

            @include('components.navbar')

            <main class="flex-1 w-full">
                @yield('content')
            </main>

            <footer class="section-divider py-10">
                <div class="max-w-7xl mx-auto px-6">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-6">

                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center font-black text-white">
                                T
                            </div>

                            <div>
                                <div class="text-white font-black leading-none">
                                    Triplay<span class="text-emerald-400">.</span>
                                </div>
                                <div class="text-neutral-400 text-xs mt-1">
                                    Healing Trip
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <a href="#" class="w-10 h-10 soft-card rounded-xl flex items-center justify-center transition">
                                <i class="fab fa-facebook-f text-neutral-300"></i>
                            </a>

                            <a href="#" class="w-10 h-10 soft-card rounded-xl flex items-center justify-center transition">
                                <i class="fab fa-instagram text-neutral-300"></i>
                            </a>

                            <a href="#" class="w-10 h-10 soft-card rounded-xl flex items-center justify-center transition">
                                <i class="fab fa-whatsapp text-neutral-300"></i>
                            </a>
                        </div>

                        <p class="text-sm text-neutral-400 text-center md:text-right">
                            &copy; {{ date('Y') }} Triplay. All rights reserved.
                        </p>

                    </div>
                </div>
            </footer>

        </div>
    </div>

</body>
</html>
