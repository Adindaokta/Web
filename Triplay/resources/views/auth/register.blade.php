<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Triplay Healing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .glass-card {
            background: rgba(17, 17, 17, 0.85);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .input-focus:focus { border-color: #10b981; background: rgba(255, 255, 255, 0.05); }
    </style>
</head>
<body class="bg-neutral-950 antialiased text-white">
    <div class="relative min-h-screen flex items-center justify-center p-6 py-20">

        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero-bg.jpg') }}" class="w-full h-full object-cover opacity-20 grayscale-[30%]">
            <div class="absolute inset-0 bg-neutral-950/80"></div>
        </div>

        <div class="relative z-10 w-full max-w-[480px] glass-card rounded-[2.5rem] p-10 md:p-14 shadow-2xl">

            <div class="flex flex-col items-center mb-10">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-emerald-500 blur-xl opacity-50"></div>
                        <div class="relative w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-600 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                    </div>
                    <span class="text-2xl font-bold text-white tracking-tight">Triplay<span class="text-emerald-400">.</span></span>
                </a>
                <h2 class="text-xl font-bold mt-6 tracking-tight uppercase">Create Account</h2>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div class="space-y-1">
                    <label class="text-[10px] font-black text-emerald-500 uppercase tracking-widest ml-1">Full Name</label>
                    <div class="relative group">
                        <i class="fas fa-user absolute left-5 top-1/2 -translate-y-1/2 text-neutral-600 group-focus-within:text-emerald-500 transition-colors"></i>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full bg-white/[0.02] border border-white/10 rounded-2xl py-3.5 pl-14 pr-6 text-white focus:outline-none input-focus transition-all" placeholder="John Doe">
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="text-[10px] font-black text-emerald-500 uppercase tracking-widest ml-1">Email</label>
                    <div class="relative group">
                        <i class="fas fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-neutral-600 group-focus-within:text-emerald-500 transition-colors"></i>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full bg-white/[0.02] border border-white/10 rounded-2xl py-3.5 pl-14 pr-6 text-white focus:outline-none input-focus transition-all" placeholder="name@mail.com">
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="text-[10px] font-black text-emerald-500 uppercase tracking-widest ml-1">Password</label>
                    <div class="relative group">
                        <i class="fas fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-neutral-600 group-focus-within:text-emerald-500 transition-colors"></i>
                        <input type="password" name="password" required
                            class="w-full bg-white/[0.02] border border-white/10 rounded-2xl py-3.5 pl-14 pr-6 text-white focus:outline-none input-focus transition-all" placeholder="••••••••">
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="text-[10px] font-black text-emerald-500 uppercase tracking-widest ml-1">Confirm</label>
                    <div class="relative group">
                        <i class="fas fa-check-double absolute left-5 top-1/2 -translate-y-1/2 text-neutral-600 group-focus-within:text-emerald-500 transition-colors"></i>
                        <input type="password" name="password_confirmation" required
                            class="w-full bg-white/[0.02] border border-white/10 rounded-2xl py-3.5 pl-14 pr-6 text-white focus:outline-none input-focus transition-all" placeholder="••••••••">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full py-4 bg-emerald-600 hover:bg-emerald-500 text-white font-black rounded-2xl shadow-xl shadow-emerald-900/40 transition-all transform hover:scale-[1.02] active:scale-95 uppercase tracking-widest text-xs">
                        Get Started
                    </button>
                </div>

                <p class="text-center text-neutral-500 text-sm">
                    Already registered? <a href="{{ route('login') }}" class="text-white font-bold hover:text-emerald-400 ml-1 transition">Login</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
