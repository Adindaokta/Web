<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">
                Kegiatan: {{ $jenis ?? 'Tidak Diketahui' }}
            </h1>
            <p class="text-center text-gray-500 mb-10">
                Jelajahi petualangan {{ strtolower($jenis) }} terbaik kami. Temukan pengalaman healing yang memadukan alam, ketenangan, dan tantangan.
            </p>

            @if($destinations->isEmpty())
                <p class="text-center text-gray-500 italic">
                    Belum ada data destinasi untuk kategori ini.
                </p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($destinations as $destination)
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 overflow-hidden">
                            <img src="{{ asset('storage/' . $destination->image) }}"
                                 alt="{{ $destination->name }}"
                                 class="h-48 w-full object-cover">
                            <div class="p-5">
                                <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $destination->name }}</h2>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ $destination->description }}
                                </p>
                                <a href="{{ route('destinations.show', $destination->id) }}"
                                   class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-full text-sm font-semibold transition">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
