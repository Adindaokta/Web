@extends('layouts.admin')

@section('content')
<div class="p-6 space-y-6">

    <div>
        <h1 class="text-3xl font-black text-white">
            Pendapatan
        </h1>
        <p class="text-gray-400">
            Halaman khusus superadmin untuk melihat pemasukan dari booking dan transaksi.
        </p>
    </div>

    <div class="rounded-2xl bg-neutral-900 border border-white/10 p-8">
        <h2 class="text-2xl font-black text-emerald-400 mb-2">
            Rp 0
        </h2>
        <p class="text-gray-400">
            Data pendapatan akan muncul setelah sistem payment dan booking aktif.
        </p>
    </div>

</div>
@endsection
