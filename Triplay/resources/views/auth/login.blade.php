<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Triplay Healing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .glass-card {
            background: rgba(17, 17, 17, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-neutral-950 text-white overflow-hidden">
    <div class="relative min-h-screen flex items-center justify-center p-6">

        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero-bg.jpg') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-neutral-950/60"></div>
        </div>

        <div class="relative z-10 w-full max-w-[450px] glass-card rounded-[2.5rem] p-10 shadow-2xl">

            <div class="flex flex-col items-center mb-10">
                <div class="relative mb-4">
                    <div class="absolute inset-0 bg-emerald-500 blur-xl opacity-50"></div>
                    <div class="relative w-14 h-14 bg-gradient-to-br from-emerald-400 to-teal-600 rounded-xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-3xl font-bold tracking-tight text-white">Triplay<span class="text-emerald-400">.</span></h1>
                <p class="text-neutral-300 text-sm mt-2">Sign in to continue healing</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label class="text-[10px] font-bold text-emerald-400 uppercase tracking-widest ml-1">Email Address</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-neutral-500"></i>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 pl-14 pr-6 text-white focus:outline-none focus:border-emerald-500 transition-all"
                            placeholder="email@example.com">
                    </div>
                    @error('email') <p class="text-red-500 text-[10px] mt-1 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between ml-1">
                        <label class="text-[10px] font-bold text-emerald-400 uppercase tracking-widest">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-[10px] text-neutral-400 hover:text-emerald-400 transition">Forgot?</a>
                        @endif
                    </div>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-neutral-500"></i>
                        <input type="password" name="password" required
                            class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 pl-14 pr-6 text-white focus:outline-none focus:border-emerald-500 transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-4 bg-emerald-600 hover:bg-emerald-500 text-white font-black rounded-2xl shadow-xl shadow-emerald-900/40 transition-all transform hover:scale-[1.02] uppercase tracking-widest text-xs">
                        Sign In
                    </button>
                </div>

                <div class="text-center">
                    <p class="text-neutral-400 text-sm">
                        New traveler? <a href="{{ route('register') }}" class="text-emerald-400 font-bold hover:underline ml-1">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
