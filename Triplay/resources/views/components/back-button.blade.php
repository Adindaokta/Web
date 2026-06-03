<div class="mb-6">
    <button type="button"
            onclick="if(document.referrer){ history.back(); } else { window.location='{{ route('home') }}'; }"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/10 hover:bg-white/15 border border-white/10 text-white font-semibold transition">
        <span>←</span>
        <span>Kembali</span>
    </button>
</div>
