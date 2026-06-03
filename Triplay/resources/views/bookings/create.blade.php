@extends('layouts.app')

@section('content')
<section class="pt-32 pb-24 min-h-screen">
    <div class="max-w-6xl mx-auto px-6">

        @include('components.back-button')

        <div class="grid lg:grid-cols-3 gap-8 items-start">

            {{-- FORM --}}
            <div class="lg:col-span-2 soft-card rounded-3xl p-8">

                <div class="mb-8">
                    <p class="text-emerald-400 font-bold uppercase tracking-wider text-sm mb-2">
                        Booking Form
                    </p>

                    <h1 class="text-4xl font-black text-white mb-3">
                        Pesan {{ $destination->title }}
                    </h1>

                    <p class="text-neutral-400">
                        Isi data pemesanan, pilih layanan tambahan bila diperlukan, lalu cek total biaya sebelum melanjutkan.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 rounded-xl bg-red-500/10 border border-red-500/30 p-4 text-red-300">
                        <p class="font-bold mb-2">Data belum lengkap:</p>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('bookings.store', $destination->id) }}" method="POST" class="space-y-7">
                    @csrf

                    {{-- USER DATA --}}
                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm text-neutral-300 mb-2">Nama Pemesan</label>
                            <input type="text"
                                   value="{{ auth()->user()->name }}"
                                   readonly
                                   class="w-full rounded-xl bg-white/5 border border-white/10 text-neutral-300 px-4 py-3 cursor-not-allowed">
                        </div>

                        <div>
                            <label class="block text-sm text-neutral-300 mb-2">Email</label>
                            <input type="email"
                                   value="{{ auth()->user()->email }}"
                                   readonly
                                   class="w-full rounded-xl bg-white/5 border border-white/10 text-neutral-300 px-4 py-3 cursor-not-allowed">
                        </div>

                        <div>
                            <label class="block text-sm text-neutral-300 mb-2">Nomor WhatsApp / HP</label>
                            <input type="text"
                                   name="customer_phone"
                                   value="{{ old('customer_phone') }}"
                                   class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3 focus:outline-none focus:border-emerald-400"
                                   placeholder="Contoh: 081234567890">
                        </div>

                        <div>
                            <label class="block text-sm text-neutral-300 mb-2">Tanggal Trip</label>
                            <input type="date"
                                   name="booking_date"
                                   value="{{ old('booking_date') }}"
                                   class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3 focus:outline-none focus:border-emerald-400">
                        </div>

                        <div>
                            <label class="block text-sm text-neutral-300 mb-2">Jumlah Orang</label>
                            <input type="number"
                                   id="participant_count"
                                   name="participant_count"
                                   value="{{ old('participant_count', 1) }}"
                                   min="1"
                                   class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3 focus:outline-none focus:border-emerald-400">
                        </div>

                        <div>
                            <label class="block text-sm text-neutral-300 mb-2">Metode Pembayaran</label>
                            <select name="payment_method"
                                    class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3 focus:outline-none focus:border-emerald-400">
                                <option value="bank_transfer">Transfer Bank</option>
                                <option value="app_payment">Bayar di Aplikasi</option>
                                <option value="cash">Bayar di Tempat</option>
                            </select>
                        </div>
                    </div>

                    {{-- ADDITIONAL SERVICES --}}
                    <div>
                        <div class="mb-4">
                            <h2 class="text-2xl font-black text-white">
                                Layanan Tambahan
                            </h2>
                            <p class="text-neutral-400 text-sm">
                                Pilih jika ingin menambahkan ojek, sewa alat, guide, porter, atau layanan lain.
                            </p>
                        </div>

                        @if($services->count() > 0)
                            <div class="space-y-4">
                                @foreach($services as $index => $service)
                                    <div class="rounded-2xl bg-white/5 border border-white/10 p-5">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                                            <label class="flex items-start gap-4 cursor-pointer flex-1">
                                                <input type="checkbox"
                                                       name="services[{{ $index }}][selected]"
                                                       value="1"
                                                       class="service-check mt-1"
                                                       data-price="{{ $service->price }}"
                                                       data-index="{{ $index }}">

                                                <input type="hidden"
                                                       name="services[{{ $index }}][id]"
                                                       value="{{ $service->id }}">

                                                <div>
                                                    <h3 class="text-white font-bold text-lg">
                                                        {{ $service->name }}
                                                    </h3>

                                                    <p class="text-neutral-400 text-sm mb-2">
                                                        {{ $service->description }}
                                                    </p>

                                                    <div class="flex flex-wrap gap-2 items-center">
                                                        <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-300 text-xs font-bold uppercase">
                                                            {{ $service->type }}
                                                        </span>

                                                        <span class="text-emerald-400 font-black">
                                                            Rp {{ number_format($service->price, 0, ',', '.') }}
                                                        </span>

                                                        <span class="text-neutral-500 text-sm">
                                                            / {{ $service->unit }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </label>

                                            <div class="w-full md:w-32">
                                                <label class="block text-xs text-neutral-400 mb-2">Jumlah</label>
                                                <input type="number"
                                                       name="services[{{ $index }}][quantity]"
                                                       value="1"
                                                       min="1"
                                                       class="service-qty w-full rounded-xl bg-black/30 border border-white/10 text-white px-3 py-2 focus:outline-none focus:border-emerald-400"
                                                       data-index="{{ $index }}">
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="rounded-2xl bg-white/5 border border-white/10 p-6 text-neutral-400">
                                Belum ada layanan tambahan yang tersedia.
                            </div>
                        @endif
                    </div>

                    {{-- NOTES --}}
                    <div>
                        <label class="block text-sm text-neutral-300 mb-2">Catatan Tambahan</label>
                        <textarea name="notes"
                                  rows="4"
                                  class="w-full rounded-xl bg-white/5 border border-white/10 text-white px-4 py-3 focus:outline-none focus:border-emerald-400"
                                  placeholder="Contoh: butuh ojek dari meeting point, peserta pemula, permintaan khusus, dan sebagainya.">{{ old('notes') }}</textarea>
                    </div>

                    <button type="submit"
                            class="w-full rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-black px-6 py-4 transition">
                        Buat Booking
                    </button>
                </form>
            </div>

            {{-- SUMMARY --}}
            <div class="lg:col-span-1">
                <div class="soft-card rounded-3xl p-7 sticky top-28">

                    <h2 class="text-2xl font-black text-white mb-5">
                        Ringkasan Pembayaran
                    </h2>

                    <div class="space-y-4 text-sm">

                        <div class="flex justify-between gap-4">
                            <span class="text-neutral-400">Destinasi</span>
                            <span class="text-white font-bold text-right">
                                {{ $destination->title }}
                            </span>
                        </div>

                        <div class="flex justify-between gap-4">
                            <span class="text-neutral-400">Harga / orang</span>
                            <span class="text-white font-bold">
                                Rp {{ number_format($destination->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="flex justify-between gap-4">
                            <span class="text-neutral-400">Jumlah orang</span>
                            <span class="text-white font-bold" id="summary_people">1</span>
                        </div>

                        <div class="border-t border-white/10 pt-4 flex justify-between gap-4">
                            <span class="text-neutral-400">Subtotal paket</span>
                            <span class="text-white font-bold" id="summary_base">
                                Rp {{ number_format($destination->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <div class="flex justify-between gap-4">
                            <span class="text-neutral-400">Layanan tambahan</span>
                            <span class="text-white font-bold" id="summary_services">
                                Rp 0
                            </span>
                        </div>

                        <div class="border-t border-white/10 pt-5">
                            <p class="text-neutral-400 mb-2">Total pembayaran</p>
                            <p class="text-4xl font-black text-emerald-400" id="summary_total">
                                Rp {{ number_format($destination->price, 0, ',', '.') }}
                            </p>
                        </div>

                        <div class="rounded-2xl bg-white/5 border border-white/10 p-4 text-neutral-400 text-xs leading-relaxed">
                            Payment gateway akan ditambahkan pada tahap berikutnya. Untuk saat ini, pesanan akan masuk sebagai menunggu pembayaran.
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<script>
    const basePrice = {{ (float) $destination->price }};

    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(number);
    }

    function calculateTotal() {
        const participantInput = document.getElementById('participant_count');
        const participantCount = Math.max(parseInt(participantInput.value || 1), 1);

        let baseTotal = basePrice * participantCount;
        let serviceTotal = 0;

        document.querySelectorAll('.service-check').forEach(function (checkbox) {
            const index = checkbox.dataset.index;
            const price = parseFloat(checkbox.dataset.price || 0);
            const qtyInput = document.querySelector('.service-qty[data-index="' + index + '"]');
            const qty = Math.max(parseInt(qtyInput.value || 1), 1);

            if (checkbox.checked) {
                serviceTotal += price * qty;
            }
        });

        const grandTotal = baseTotal + serviceTotal;

        document.getElementById('summary_people').textContent = participantCount;
        document.getElementById('summary_base').textContent = formatRupiah(baseTotal);
        document.getElementById('summary_services').textContent = formatRupiah(serviceTotal);
        document.getElementById('summary_total').textContent = formatRupiah(grandTotal);
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('participant_count').addEventListener('input', calculateTotal);

        document.querySelectorAll('.service-check').forEach(function (checkbox) {
            checkbox.addEventListener('change', calculateTotal);
        });

        document.querySelectorAll('.service-qty').forEach(function (input) {
            input.addEventListener('input', calculateTotal);
        });

        calculateTotal();
    });
</script>
@endsection
