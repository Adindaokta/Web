@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-neutral-900 py-12 px-6 text-white">
    <div class="max-w-4xl mx-auto">

        <h2 class="text-4xl font-black mb-10">
            Tambah
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">
                Destinasi
            </span>
        </h2>

        <div class="bg-neutral-800/70 backdrop-blur-xl border border-white/5 rounded-2xl shadow-2xl p-10">

            <form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label class="block text-sm uppercase text-neutral-400 font-bold mb-2">Nama Destinasi</label>
                    <input type="text" name="title"
                        class="w-full bg-neutral-900 border border-white/10 rounded-xl px-4 py-3 focus:ring-emerald-500 outline-none"
                        required>
                </div>

                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <select name="category"
                        class="bg-neutral-900 border border-white/10 rounded-xl px-4 py-3">
                        <option value="hiking">Hiking</option>
                        <option value="trekking">Trekking</option>
                        <option value="camping">Camping</option>
                    </select>

                    <input type="number" name="price"
                        class="bg-neutral-900 border border-white/10 rounded-xl px-4 py-3"
                        placeholder="Harga" required>
                </div>

                <textarea name="description" rows="5"
                    class="w-full bg-neutral-900 border border-white/10 rounded-xl px-4 py-3 mb-6"
                    placeholder="Deskripsi" required></textarea>

                <input type="file" name="image"
                    class="w-full bg-neutral-900 border border-dashed border-white/20 rounded-xl px-4 py-3 mb-8" required>

                <div class="flex justify-end">
                    <button class="px-10 py-3 bg-emerald-600 hover:bg-emerald-500 rounded-xl font-bold shadow-lg transition">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
