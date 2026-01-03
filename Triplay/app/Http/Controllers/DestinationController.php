<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    // --- BAGIAN PUBLIC (DILIHAT TAMU) ---

    // Menampilkan daftar berdasarkan kategori (Hiking/Trekking/Camping)
    public function index($category = null)
    {
        // Jika dipanggil oleh Admin Route (tanpa kategori), tampilkan semua di dashboard
        if (request()->routeIs('destinations.dashboard')) {
            return $this->adminDashboard();
        }

        // Logic untuk Public
        $destinations = Destination::where('category', $category)->latest()->get();
        return view('destinations.index', compact('destinations', 'category'));
    }

    public function show(Destination $destination)
    {
        return view('destinations.show', compact('destination'));
    }

    // --- BAGIAN ADMIN (CRUD DASHBOARD) ---

    public function adminDashboard()
    {
        // Hanya Admin/Superadmin yang boleh akses (Middleware handle ini)
        $destinations = Destination::latest()->get();
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('admin.destinations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|in:hiking,trekking,camping',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload Image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinations', 'public');
        }

        Destination::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        return redirect()->route('destinations.dashboard')->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required|in:hiking,trekking,camping',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // Cek jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($destination->image) {
                Storage::disk('public')->delete($destination->image);
            }
            $data['image'] = $request->file('image')->store('destinations', 'public');
        }

        $destination->update($data);

        return redirect()->route('destinations.dashboard')->with('success', 'Destinasi berhasil diperbarui!');
    }

    public function destroy(Destination $destination)
    {
        if ($destination->image) {
            Storage::disk('public')->delete($destination->image);
        }
        $destination->delete();

        return redirect()->route('destinations.dashboard')->with('success', 'Destinasi berhasil dihapus!');
    }
}