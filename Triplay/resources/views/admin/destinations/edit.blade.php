@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-neutral-900 py-12 px-6 text-white">
    <div class="max-w-4xl mx-auto">

        <h2 class="text-4xl font-black mb-10">
            Edit
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-400">
                Destinasi
            </span>
        </h2>

        <div class="bg-neutral-800/70 backdrop-blur-xl border border-white/5 rounded-2xl shadow-2xl p-10">

            <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- TITLE -->
                <div class="mb-6">
                    <label class="block text-sm uppercase text-neutral-400 font-bold mb-2">Nama Destinasi</label>
                    <input type="text" name="title" value="{{ $destination->title }}"
                        class="w-full bg-neutral-900 border border-white/10 rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 outline-none transition"
                        required>
                </div>

                <!-- CATEGORY & PRICE -->
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm uppercase text-neutral-400 font-bold mb-2">Kategori</label>
                        <select name="category"
                            class="w-full bg-neutral-900 border border-white/10 rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 outline-none">
                            <option value="hiking" {{ $destination->category=='hiking'?'selected':'' }}>Hiking</option>
                            <option value="trekking" {{ $destination->category=='trekking'?'selected':'' }}>Trekking</option>
                            <option value="camping" {{ $destination->category=='camping'?'selected':'' }}>Camping</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm uppercase text-neutral-400 font-bold mb-2">Harga</label>
                        <input type="number" name="price" value="{{ $destination->price }}"
                            class="w-full bg-neutral-900 border border-white/10 rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 outline-none"
                            required>
                    </div>
                </div>

                <!-- DESCRIPTION -->
                <div class="mb-6">
                    <label class="block text-sm uppercase text-neutral-400 font-bold mb-2">Deskripsi</label>
                    <textarea name="description" rows="5"
                        class="w-full bg-neutral-900 border border-white/10 rounded-xl px-4 py-3 focus:ring-2 focus:ring-emerald-500 outline-none"
                        required>{{ $destination->description }}</textarea>
                </div>

                <!-- IMAGE -->
                <div class="mb-8">
                    <label class="block text-sm uppercase text-neutral-400 font-bold mb-3">Foto</label>

                    @if($destination->image)
                        <img src="{{ asset('storage/'.$destination->image) }}"
                             class="w-40 h-28 object-cover rounded-xl mb-4 border border-white/10">
                    @endif

                    <input type="file" name="image"
                        class="w-full bg-neutral-900 border border-dashed border-white/20 rounded-xl px-4 py-3">
                </div>

                <!-- ACTION -->
                <div class="flex justify-between items-center pt-6 border-t border-white/5">
                    <a href="{{ route('admin.dashboard') }}"
                       class="text-neutral-400 hover:text-white font-semibold transition">
                        ← Kembali
                    </a>

                    <button
                        class="px-10 py-3 bg-emerald-600 hover:bg-emerald-500 rounded-xl font-bold transition shadow-lg">
                        Update
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
