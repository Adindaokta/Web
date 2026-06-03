<nav class="fixed top-0 left-0 right-0 z-50 border-b border-white/10 bg-neutral-950/75 backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="h-16 md:h-20 flex items-center justify-between">

            {{-- Logo --}}
            <a href="{{ route('home') }}#home" class="flex items-center gap-3 shrink-0">
                <div class="w-10 h-10 rounded-xl bg-emerald-600 flex items-center justify-center font-black text-white">
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
            </a>

            {{-- Desktop menu --}}
            <div class="hidden lg:flex items-center gap-8 text-sm font-semibold text-neutral-300">
                <a href="{{ route('home') }}#home" class="hover:text-emerald-400 transition">Home</a>
                <a href="{{ route('home') }}#adventure" class="hover:text-emerald-400 transition">Adventure</a>
                <a href="{{ route('home') }}#services" class="hover:text-emerald-400 transition">Services</a>
                <a href="{{ route('home') }}#about" class="hover:text-emerald-400 transition">About</a>
                <a href="{{ route('home') }}#contact" class="hover:text-emerald-400 transition">Contact</a>
            </div>

            {{-- Auth desktop --}}
            <div class="hidden lg:flex items-center gap-3">
                @guest
                    <a href="{{ route('login') }}"
                       class="px-5 py-2.5 rounded-xl text-white font-bold hover:bg-white/10 transition">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold transition shadow-lg hover:shadow-emerald-500/30">
                        Register
                    </a>
                @else
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                                class="flex items-center gap-3 px-4 py-2 rounded-xl bg-white/10 hover:bg-white/15 border border-white/10 transition">

                            <div class="w-9 h-9 rounded-full bg-emerald-600 flex items-center justify-center font-black text-white uppercase">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <div class="text-left">
                                <div class="text-white text-sm font-bold leading-none max-w-[130px] truncate">
                                    {{ Auth::user()->name }}
                                </div>

                                <div class="text-neutral-400 text-xs mt-1">
                                    {{ Auth::user()->role ?? 'user' }}
                                </div>
                            </div>

                            <span class="text-neutral-400">▾</span>
                        </button>

                        <div x-show="open"
                             x-cloak
                             @click.away="open = false"
                             x-transition
                             class="absolute right-0 mt-3 w-64 rounded-2xl bg-neutral-950 border border-white/10 shadow-2xl overflow-hidden">

                            <div class="px-5 py-4 border-b border-white/10">
                                <div class="text-sm font-bold text-white truncate">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="text-xs text-neutral-400 truncate mt-1">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>

                            <a href="{{ route('profile.edit') }}"
                               class="block px-5 py-4 text-sm text-neutral-300 hover:bg-white/10 hover:text-white transition">
                                ⚙️ Setting Profile
                            </a>

                            @if(\Illuminate\Support\Facades\Route::has('wallet.index'))
                                <a href="{{ route('wallet.index') }}"
                                   class="block px-5 py-4 text-sm text-neutral-300 hover:bg-white/10 hover:text-white transition">
                                    💰 Saldo Saya
                                </a>
                            @endif

                            @if(\Illuminate\Support\Facades\Route::has('orders.index'))
                                <a href="{{ route('orders.index') }}"
                                   class="block px-5 py-4 text-sm text-neutral-300 hover:bg-white/10 hover:text-white transition">
                                    📦 Riwayat Pesanan
                                </a>
                            @endif

                            @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                                <a href="{{ route('admin.dashboard') }}"
                                   class="block px-5 py-4 text-sm text-neutral-300 hover:bg-white/10 hover:text-white transition">
                                    🧭 Dashboard Admin
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full text-left px-5 py-4 text-sm text-red-400 hover:bg-red-500/10 transition">
                                    🚪 Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            {{-- Mobile button --}}
            <button id="menu-toggle"
                    type="button"
                    class="lg:hidden w-10 h-10 rounded-xl bg-white/10 border border-white/10 flex items-center justify-center text-white">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div id="mobile-menu" class="hidden lg:hidden border-t border-white/10 bg-neutral-950/95 backdrop-blur-xl">
        <div class="px-6 py-6 space-y-4">
            <a href="{{ route('home') }}#home" class="block text-neutral-300 hover:text-emerald-400 transition">Home</a>
            <a href="{{ route('home') }}#adventure" class="block text-neutral-300 hover:text-emerald-400 transition">Adventure</a>
            <a href="{{ route('home') }}#services" class="block text-neutral-300 hover:text-emerald-400 transition">Services</a>
            <a href="{{ route('home') }}#about" class="block text-neutral-300 hover:text-emerald-400 transition">About</a>
            <a href="{{ route('home') }}#contact" class="block text-neutral-300 hover:text-emerald-400 transition">Contact</a>

            <div class="pt-5 border-t border-white/10">
                @guest
                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ route('login') }}"
                           class="text-center px-4 py-3 rounded-xl bg-white/10 text-white font-bold">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                           class="text-center px-4 py-3 rounded-xl bg-emerald-600 text-white font-bold">
                            Register
                        </a>
                    </div>
                @else
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-11 h-11 rounded-full bg-emerald-600 flex items-center justify-center font-black text-white uppercase">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>

                        <div>
                            <div class="text-white font-bold">{{ Auth::user()->name }}</div>
                            <div class="text-neutral-400 text-xs">{{ Auth::user()->email }}</div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <a href="{{ route('profile.edit') }}"
                           class="block px-4 py-3 rounded-xl bg-white/10 text-neutral-300">
                            ⚙️ Setting Profile
                        </a>

                        @if(\Illuminate\Support\Facades\Route::has('wallet.index'))
                            <a href="{{ route('wallet.index') }}"
                               class="block px-4 py-3 rounded-xl bg-white/10 text-neutral-300">
                                💰 Saldo Saya
                            </a>
                        @endif

                        @if(\Illuminate\Support\Facades\Route::has('orders.index'))
                            <a href="{{ route('orders.index') }}"
                               class="block px-4 py-3 rounded-xl bg-white/10 text-neutral-300">
                                📦 Riwayat Pesanan
                            </a>
                        @endif

                        @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                            <a href="{{ route('admin.dashboard') }}"
                               class="block px-4 py-3 rounded-xl bg-white/10 text-neutral-300">
                                🧭 Dashboard Admin
                            </a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-3 rounded-xl bg-red-500/10 text-red-400">
                                🚪 Logout
                            </button>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('mobile-menu');

        if (toggle && menu) {
            toggle.addEventListener('click', function () {
                menu.classList.toggle('hidden');
            });

            menu.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    menu.classList.add('hidden');
                });
            });
        }
    });
</script>
