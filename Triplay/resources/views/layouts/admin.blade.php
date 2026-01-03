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
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all
               {{ request()->routeIs('admin.dashboard')
               ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-lg'
               : 'text-gray-400 hover:bg-slate-800 hover:text-emerald-400' }}">
                <i class="fas fa-house"></i>
                Dashboard
            </a>

            <a href="{{ route('admin.destinations') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all
               {{ request()->routeIs('admin.destinations*')
               ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-lg'
               : 'text-gray-400 hover:bg-slate-800 hover:text-emerald-400' }}">
                <i class="fas fa-mountain"></i>
                Destinasi
            </a>

            <a href="{{ route('admin.users') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-all
               {{ request()->routeIs('admin.users*')
               ? 'bg-gradient-to-r from-emerald-600 to-teal-600 text-white shadow-lg'
               : 'text-gray-400 hover:bg-slate-800 hover:text-emerald-400' }}">
                <i class="fas fa-users"></i>
                User
            </a>

            <a href="/" target="_blank"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-400 hover:bg-slate-800 hover:text-teal-400 transition">
                <i class="fas fa-arrow-up-right-from-square"></i>
                Lihat Website
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
