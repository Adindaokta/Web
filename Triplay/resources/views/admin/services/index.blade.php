@extends('layouts.admin')

@section('content')
<div class="p-6 space-y-6">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-black text-white">Kelola Layanan</h1>
            <p class="text-gray-400">Kelola ojek, sewa alat, guide, porter, dan layanan tambahan lainnya.</p>
        </div>

        <a href="{{ route('admin.services.create') }}"
           class="px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold">
            + Tambah Layanan
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 p-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-2xl bg-neutral-900 border border-white/10 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-black/30 text-gray-400">
                <tr>
                    <th class="px-6 py-4 text-left">Nama</th>
                    <th class="px-6 py-4 text-left">Tipe</th>
                    <th class="px-6 py-4 text-left">Harga</th>
                    <th class="px-6 py-4 text-left">Status</th>
                    <th class="px-6 py-4 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-white/10">
                @forelse($services as $service)
                    <tr class="text-gray-300">
                        <td class="px-6 py-4 font-bold text-white">{{ $service->name }}</td>
                        <td class="px-6 py-4">{{ $service->type }}</td>
                        <td class="px-6 py-4">Rp {{ number_format($service->price, 0, ',', '.') }} / {{ $service->unit }}</td>
                        <td class="px-6 py-4">
                            @if($service->is_active)
                                <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 text-xs font-bold">Aktif</span>
                            @else
                                <span class="px-3 py-1 rounded-full bg-red-500/10 text-red-400 text-xs font-bold">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 flex gap-2">
                            <a href="{{ route('admin.services.edit', $service->id) }}"
                               class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold">
                                Edit
                            </a>

                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus layanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-2 rounded-xl bg-red-600 hover:bg-red-500 text-white text-xs font-bold">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            Belum ada layanan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $services->links() }}

</div>
@endsection
