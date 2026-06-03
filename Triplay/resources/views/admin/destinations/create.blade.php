@extends('layouts.admin')

@section('content')
<div class="p-6 space-y-6">

    <div>
        <h1 class="text-3xl font-black text-white">Tambah Destinasi</h1>
        <p class="text-gray-400">Isi data destinasi secara terstruktur agar tampil rapi di website.</p>
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

    <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Nama Destinasi</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                       placeholder="Contoh: Gunung Bromo">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Kategori</label>
                <select name="category" class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3">
                    <option value="">Pilih kategori</option>
                    <option value="hiking">Hiking</option>
                    <option value="trekking">Trekking</option>
                    <option value="camping">Camping</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Harga Paket</label>
                <input type="number" name="price" value="{{ old('price') }}"
                       class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                       placeholder="Contoh: 150000">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Tingkat Kesulitan</label>
                <select name="difficulty_level" class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3">
                    <option value="easy">Easy / Pemula</option>
                    <option value="medium">Medium / Menengah</option>
                    <option value="hard">Hard / Sulit</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Lokasi</label>
                <input type="text" name="location" value="{{ old('location') }}"
                       class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                       placeholder="Contoh: Probolinggo, Jawa Timur">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Meeting Point</label>
                <input type="text" name="meeting_point" value="{{ old('meeting_point') }}"
                       class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                       placeholder="Contoh: Terminal Probolinggo">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Estimasi Durasi</label>
                <input type="text" name="estimated_duration" value="{{ old('estimated_duration') }}"
                       class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                       placeholder="Contoh: 4-6 jam">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-300 mb-2">Ketinggian MDPL</label>
                <input type="number" name="altitude_mdpl" value="{{ old('altitude_mdpl') }}"
                       class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                       placeholder="Contoh: 2329">
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Deskripsi Singkat Tempat</label>
            <textarea name="description" rows="4"
                      class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                      placeholder="Ceritakan gambaran singkat destinasi">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Fasilitas</label>
            <textarea name="facilities" rows="3"
                      class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                      placeholder="Contoh: Tiket masuk, guide, briefing, dokumentasi">{{ old('facilities') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Catatan Keselamatan</label>
            <textarea name="safety_notes" rows="3"
                      class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3"
                      placeholder="Contoh: Gunakan sepatu outdoor, bawa jas hujan, ikuti arahan guide">{{ old('safety_notes') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-300 mb-2">Foto Destinasi</label>
            <input type="file" name="image" accept="image/*"
                   class="w-full rounded-xl bg-gray-950 border border-gray-700 text-white px-4 py-3">
        </div>

        <div class="flex gap-3">
            <button type="submit"
                    class="px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold">
                Simpan Destinasi
            </button>

            <a href="{{ route('admin.destinations') }}"
               class="px-6 py-3 rounded-xl bg-gray-700 hover:bg-gray-600 text-white font-bold">
                Batal
            </a>
        </div>
    </form>

</div>
@endsection
