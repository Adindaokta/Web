<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash; // <--- PENTING: Tambahkan ini

class AdminController extends Controller
{
    // =========================================================================
    // 1. DASHBOARD
    // =========================================================================
    public function index()
    {
        $totalDestinations = Destination::count();
        $totalUsers = User::count();
        $recentDestinations = Destination::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalDestinations', 'totalUsers', 'recentDestinations'));
    }

    // =========================================================================
    // 2. MANAJEMEN DESTINASI (CRUD)
    // =========================================================================

    // Tampilkan List
    public function destinations()
    {
        $destinations = Destination::latest()->paginate(10);
        return view('admin.destinations.index', compact('destinations'));
    }

    // Halaman Create
    public function createDestination()
    {
        return view('admin.destinations.create');
    }

    // Proses Simpan (Store)
    public function storeDestination(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:destinations,title', // Validasi nama unik
            'category' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('destinations', 'public');

        Destination::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.destinations')->with('success', 'Destinasi berhasil ditambahkan!');
    }

    // Halaman Edit
    public function editDestination($id)
    {
        $destination = Destination::findOrFail($id);
        return view('admin.destinations.edit', compact('destination'));
    }

    // Proses Update
    public function updateDestination(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        $request->validate([
            // Validasi nama unik, tapi abaikan ID destinasi ini sendiri
            'title' => 'required|string|max:255|unique:destinations,title,' . $id,
            'category' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
        ];

        // Cek jika ada upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($destination->image) {
                Storage::disk('public')->delete($destination->image);
            }
            // Upload baru
            $data['image'] = $request->file('image')->store('destinations', 'public');
        }

        $destination->update($data);

        return redirect()->route('admin.destinations')->with('success', 'Destinasi berhasil diperbarui!');
    }

    // Proses Hapus
    public function destroyDestination($id)
    {
        $destination = Destination::findOrFail($id);

        // Hapus file gambar dari storage
        if ($destination->image) {
            Storage::disk('public')->delete($destination->image);
        }

        $destination->delete();

        return redirect()->back()->with('success', 'Destinasi dihapus.');
    }

    // =========================================================================
    // 3. MANAJEMEN USER (CRUD)
    // =========================================================================

    // Tampilkan List
    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // Proses Simpan User Baru
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Menggunakan Facade Hash
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users')->with('success', 'User berhasil ditambahkan!');
    }

    // Proses Update User
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
        ];

        // Hanya update password jika field diisi
        if ($request->filled('password')) {
            $request->validate(['password' => 'min:6|confirmed']);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users')->with('success', 'User berhasil diperbarui!');
    }

    // Proses Hapus User
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
}
