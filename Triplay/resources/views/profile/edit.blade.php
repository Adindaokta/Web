@extends('layouts.app')

@section('content')
<section class="pt-32 pb-24 min-h-screen">
    <div class="max-w-5xl mx-auto px-6">

        @include('components.back-button')

        <div class="grid lg:grid-cols-3 gap-8 items-start">

            {{-- PROFILE CARD --}}
            <div class="lg:col-span-1 soft-card rounded-3xl p-7">
                <div class="w-20 h-20 rounded-3xl bg-emerald-600 flex items-center justify-center text-white text-3xl font-black mb-5">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <h1 class="text-2xl font-black text-white mb-1">
                    {{ auth()->user()->name }}
                </h1>

                <p class="text-neutral-400 mb-5">
                    {{ auth()->user()->email }}
                </p>

                <div class="space-y-3">
                    <div class="rounded-2xl bg-white/5 border border-white/10 p-4">
                        <p class="text-neutral-400 text-sm">Role</p>
                        <p class="text-emerald-400 font-bold uppercase">
                            {{ auth()->user()->role }}
                        </p>
                    </div>

                    <div class="rounded-2xl bg-white/5 border border-white/10 p-4">
                        <p class="text-neutral-400 text-sm">Saldo</p>
                        <p class="text-white font-black">
                            Rp 0
                        </p>
                    </div>
                </div>
            </div>

            {{-- FORMS --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- UPDATE PROFILE --}}
                <div class="soft-card rounded-3xl p-8">
                    <h2 class="text-3xl font-black text-white mb-3">
                        Informasi Profile
                    </h2>

                    <p class="text-neutral-400 mb-6">
                        Perbarui nama dan email akun kamu.
                    </p>

                    @if(session('status') === 'profile-updated')
                        <div class="mb-6 rounded-xl bg-emerald-500/10 border border-emerald-500/30 p-4 text-emerald-300">
                            Profile berhasil diperbarui.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label class="block text-sm text-neutral-300 mb-2">Nama</label>
                            <input type="text"
                                   name="name"
                                   value="{{ old('name', auth()->user()->name) }}"
                                   class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3 focus:outline-none focus:border-emerald-400">

                            @error('name')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm text-neutral-300 mb-2">Email</label>
                            <input type="email"
                                   name="email"
                                   value="{{ old('email', auth()->user()->email) }}"
                                   class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3 focus:outline-none focus:border-emerald-400">

                            @error('email')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold transition">
                            Simpan Profile
                        </button>
                    </form>
                </div>

                {{-- UPDATE PASSWORD --}}
                <div class="soft-card rounded-3xl p-8">
                    <h2 class="text-3xl font-black text-white mb-3">
                        Ubah Password
                    </h2>

                    <p class="text-neutral-400 mb-6">
                        Gunakan password yang kuat dan mudah kamu ingat.
                    </p>

                    @if(session('status') === 'password-updated')
                        <div class="mb-6 rounded-xl bg-emerald-500/10 border border-emerald-500/30 p-4 text-emerald-300">
                            Password berhasil diperbarui.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm text-neutral-300 mb-2">Password Saat Ini</label>
                            <input type="password"
                                   name="current_password"
                                   class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3 focus:outline-none focus:border-emerald-400">

                            @error('current_password', 'updatePassword')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm text-neutral-300 mb-2">Password Baru</label>
                            <input type="password"
                                   name="password"
                                   class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3 focus:outline-none focus:border-emerald-400">

                            @error('password', 'updatePassword')
                                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm text-neutral-300 mb-2">Konfirmasi Password Baru</label>
                            <input type="password"
                                   name="password_confirmation"
                                   class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3 focus:outline-none focus:border-emerald-400">
                        </div>

                        <button type="submit"
                                class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold transition">
                            Update Password
                        </button>
                    </form>
                </div>

                {{-- QUICK LINKS --}}
                <div class="grid md:grid-cols-2 gap-5">
                    <a href="{{ route('wallet.index') }}"
                       class="soft-card rounded-3xl p-6 hover:border-emerald-400/40 transition">
                        <h3 class="text-xl font-black text-white mb-2">
                            Saldo Saya
                        </h3>
                        <p class="text-neutral-400">
                            Lihat saldo dan riwayat top up.
                        </p>
                    </a>

                    <a href="{{ route('orders.index') }}"
                       class="soft-card rounded-3xl p-6 hover:border-emerald-400/40 transition">
                        <h3 class="text-xl font-black text-white mb-2">
                            Riwayat Pesanan
                        </h3>
                        <p class="text-neutral-400">
                            Lihat booking destinasi dan layanan yang kamu pesan.
                        </p>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
