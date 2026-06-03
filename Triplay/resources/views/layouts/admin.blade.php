<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - TripPlay</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#10b981', // emerald-500
                        secondary: '#14b8a6', // teal-500
                        dark: '#0f172a'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-gray-100 font-sans antialiased">

<div class="flex min-h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-64 fixed inset-y-0 left-0 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 border-r border-emerald-900/40 shadow-2xl z-50">

        <!-- LOGO -->
        <div class="h-16 flex items-center justify-center border-b border-emerald-900/40">
            <h1 class="text-2xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">
                TRIPPLAY
            </h1>
        </div>

        <!-- MENU -->
<nav class="px-4 py-6 space-y-2 text-sm">

    <a href="{{ route('admin.dashboard') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl transition
       {{ request()->routeIs('admin.dashboard') ? 'bg-emerald-600 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
        <span>🏠</span>
        <span>Dashboard</span>
    </a>

    <a href="{{ route('admin.destinations') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl transition
       {{ request()->routeIs('admin.destinations*') ? 'bg-emerald-600 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
        <span>⛰️</span>
        <span>Destinasi</span>
    </a>

    <a href="{{ route('admin.services.index') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl transition
       {{ request()->routeIs('admin.services*') ? 'bg-emerald-600 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
        <span>🧰</span>
        <span>Layanan</span>
    </a>

    <a href="{{ route('admin.users') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl transition
       {{ request()->routeIs('admin.users*') ? 'bg-emerald-600 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
        <span>👥</span>
        <span>User</span>
    </a>

    @if(auth()->user()->role === 'superadmin')
        <div class="pt-5 mt-5 border-t border-white/10">
            <p class="px-4 mb-3 text-xs font-bold text-emerald-400 uppercase tracking-wider">
                Owner Finance
            </p>

            <a href="{{ route('admin.finance') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition
               {{ request()->routeIs('admin.finance') ? 'bg-emerald-600 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <span>💰</span>
                <span>Pendapatan</span>
            </a>

            <a href="{{ route('admin.expenses') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition
               {{ request()->routeIs('admin.expenses') ? 'bg-emerald-600 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <span>📉</span>
                <span>Pengeluaran</span>
            </a>

            <a href="{{ route('admin.reports') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition
               {{ request()->routeIs('admin.reports') ? 'bg-emerald-600 text-white' : 'text-gray-300 hover:bg-white/10 hover:text-white' }}">
                <span>📊</span>
                <span>Laporan Bulanan</span>
            </a>
        </div>
    @endif

    <a href="{{ route('home') }}"
       class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:bg-white/10 hover:text-white transition">
        <span>↗️</span>
        <span>Lihat Website</span>
    </a>

</nav>

        <!-- LOGOUT -->
        <div class="absolute bottom-0 w-full p-4 border-t border-emerald-900/40">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-xl font-bold
                        text-rose-400 hover:bg-rose-500/10 hover:text-rose-300 transition">
                    <i class="fas fa-right-from-bracket"></i>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- CONTENT -->
    <div class="flex-1 ml-64 flex flex-col">

        <!-- TOP BAR -->
        <header class="h-16 bg-slate-900/80 backdrop-blur border-b border-emerald-900/40 flex items-center px-8">
            <h2 class="text-lg font-black tracking-wide text-emerald-400">
                Admin Panel
            </h2>
        </header>

        <!-- PAGE CONTENT -->
        <main class="flex-1 p-8 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>
