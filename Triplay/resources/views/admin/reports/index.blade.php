@extends('layouts.admin')

@section('content')
<div class="p-6 space-y-6">

    <div>
        <h1 class="text-3xl font-black text-white">
            Laporan Bulanan
        </h1>
        <p class="text-gray-400">
            Halaman khusus superadmin untuk melihat ringkasan booking, pemasukan, dan pengeluaran bulanan.
        </p>
    </div>

    <div class="rounded-2xl bg-neutral-900 border border-white/10 p-8">
        <div class="h-72 flex items-center justify-center rounded-xl bg-black/30 border border-white/10 text-gray-500">
            Grafik laporan bulanan akan tampil setelah modul booking, payment, dan expenses aktif.
        </div>
    </div>

</div>
@endsection
