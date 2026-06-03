@extends('layouts.admin')

@section('content')
<div class="p-6 space-y-6">

    <div>
        <h1 class="text-3xl font-black text-white">
            Pengeluaran
        </h1>
        <p class="text-gray-400">
            Halaman khusus superadmin untuk mencatat dan memantau pengeluaran operasional.
        </p>
    </div>

    <div class="rounded-2xl bg-neutral-900 border border-white/10 p-8">
        <h2 class="text-2xl font-black text-red-400 mb-2">
            Rp 0
        </h2>
        <p class="text-gray-400">
            Data pengeluaran akan muncul setelah modul expenses dibuat.
        </p>
    </div>

</div>
@endsection
