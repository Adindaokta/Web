@extends('layouts.admin')

@section('content')
<div class="p-6 space-y-6">

    <div>
        <h1 class="text-3xl font-black text-white">Tambah Layanan</h1>
        <p class="text-gray-400">Tambahkan layanan seperti ojek, sewa alat, guide, porter, atau dokumentasi.</p>
    </div>

    @if ($errors->any())
        <div class="rounded-xl bg-red-500/10 border border-red-500/30 p-4 text-red-300">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Nama Layanan</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                   placeholder="Contoh: Ojek Basecamp">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Tipe Layanan</label>
            <select name="type" class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3">
                <option value="">Pilih tipe</option>
                <option value="transport">Transport / Ojek</option>
                <option value="equipment">Sewa Peralatan</option>
                <option value="guide">Guide</option>
                <option value="porter">Porter</option>
                <option value="documentation">Dokumentasi</option>
                <option value="other">Lainnya</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Harga</label>
            <input type="number" name="price" value="{{ old('price') }}"
                   class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                   placeholder="Contoh: 50000">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Satuan</label>
            <input type="text" name="unit" value="{{ old('unit', 'per layanan') }}"
                   class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                   placeholder="Contoh: per orang, per hari, per trip">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Deskripsi</label>
            <textarea name="description" rows="5"
                      class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                      placeholder="Deskripsi layanan">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Gambar Layanan</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3">
        </div>

        <label class="inline-flex items-center gap-3 text-gray-300">
            <input type="checkbox" name="is_active" value="1" checked>
            <span>Aktifkan layanan</span>
        </label>

        <div class="flex gap-3">
            <button type="submit"
                    class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold">
                Simpan Layanan
            </button>

            <a href="{{ route('admin.services.index') }}"
               class="px-6 py-3 rounded-xl bg-gray-700 hover:bg-gray-600 text-white font-bold">
                Batal
            </a>
        </div>
    </form>

</div>
@endsection
