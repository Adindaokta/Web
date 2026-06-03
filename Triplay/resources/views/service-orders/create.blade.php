@extends('layouts.app')

@section('content')
<section class="pt-32 pb-24 min-h-screen">
    <div class="max-w-4xl mx-auto px-6">

        <a href="{{ route('services.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/10 hover:bg-white/15 border border-white/10 text-white font-semibold transition mb-8">
            ← Kembali ke Services
        </a>

        <div class="soft-card rounded-3xl p-8">
            <h1 class="text-4xl font-black text-white mb-3">
                Sewa {{ $service->name }}
            </h1>

            <p class="text-neutral-400 mb-8">
                Layanan ini bisa dipesan tanpa memilih destinasi.
            </p>

            @if ($errors->any())
                <div class="mb-6 rounded-xl bg-red-500/10 border border-red-500/30 p-4 text-red-300">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('service-orders.store', $service->id) }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm text-neutral-300 mb-2">Tanggal Pemakaian</label>
                    <input type="date" name="order_date"
                           class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3">
                </div>

                <div>
                    <label class="block text-sm text-neutral-300 mb-2">Jumlah</label>
                    <input type="number" name="quantity" value="1" min="1"
                           class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3">
                </div>

                <div>
                    <label class="block text-sm text-neutral-300 mb-2">Catatan</label>
                    <textarea name="notes" rows="4"
                              class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3"></textarea>
                </div>

                <div class="rounded-2xl bg-white/5 border border-white/10 p-5">
                    <p class="text-neutral-400 text-sm">Harga</p>
                    <p class="text-3xl font-black text-emerald-400">
                        Rp {{ number_format($service->price, 0, ',', '.') }}
                        <span class="text-sm text-neutral-400">/ {{ $service->unit }}</span>
                    </p>
                </div>

                <button type="submit"
                        class="w-full rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold px-6 py-4">
                    Buat Pesanan Layanan
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
