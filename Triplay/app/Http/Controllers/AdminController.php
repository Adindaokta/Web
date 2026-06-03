<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
public function index()
{
    $user = Auth::user();

    $totalUsers = User::count();
    $totalDestinations = Destination::count();

    $recentDestinations = Destination::latest()
        ->take(5)
        ->get();

    $recentUsers = User::latest()
        ->take(5)
        ->get();

    if ($user && $user->role === 'superadmin') {
        return view('admin.dashboard-superadmin', compact(
            'totalUsers',
            'totalDestinations',
            'recentDestinations',
            'recentUsers'
        ));
    }

    return view('admin.dashboard', compact(
        'totalUsers',
        'totalDestinations',
        'recentDestinations',
        'recentUsers'
    ));
}

    // ===============================
    // DESTINATION MANAGEMENT
    // ===============================

    public function destinations()
    {
        $destinations = Destination::latest()->paginate(10);

        return view('admin.destinations.index', compact('destinations'));
    }

    public function createDestination()
    {
        return view('admin.destinations.create');
    }

    public function storeDestination(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string|max:100',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'location' => 'nullable|string|max:255',
        'meeting_point' => 'nullable|string|max:255',
        'estimated_duration' => 'nullable|string|max:100',
        'altitude_mdpl' => 'nullable|numeric|min:0',
        'difficulty_level' => 'nullable|string|max:100',
        'facilities' => 'nullable|string',
        'safety_notes' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $validated['slug'] = Str::slug($validated['title']);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('destinations', 'public');
    }

    Destination::create($validated);

    return redirect()->route('admin.destinations')
        ->with('success', 'Destinasi berhasil ditambahkan.');
}

    public function editDestination($id)
    {
        $destination = Destination::findOrFail($id);

        return view('admin.destinations.edit', compact('destination'));
    }

   public function updateDestination(Request $request, $id)
{
    $destination = Destination::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string|max:100',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'location' => 'nullable|string|max:255',
        'meeting_point' => 'nullable|string|max:255',
        'estimated_duration' => 'nullable|string|max:100',
        'altitude_mdpl' => 'nullable|numeric|min:0',
        'difficulty_level' => 'nullable|string|max:100',
        'facilities' => 'nullable|string',
        'safety_notes'=> 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $validated['slug'] = Str::slug($validated['title']);

    if ($request->hasFile('image')) {
        if ($destination->image && Storage::disk('public')->exists($destination->image)) {
            Storage::disk('public')->delete($destination->image);
        }

        $validated['image'] = $request->file('image')->store('destinations', 'public');
    }

    $destination->update($validated);

    return redirect()->route('admin.destinations')
        ->with('success', 'Destinasi berhasil diperbarui.');
}

    public function destroyDestination($id)
    {
        $destination = Destination::findOrFail($id);

        if ($destination->image && Storage::disk('public')->exists($destination->image)) {
            Storage::disk('public')->delete($destination->image);
        }

        $destination->delete();

        return redirect()
            ->route('admin.destinations')
            ->with('success', 'Destinasi berhasil dihapus.');
    }

    // ===============================
    // USER MANAGEMENT
    // ===============================

    public function users()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required|in:superadmin,admin,user',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'username' => $validated['username'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('admin.users')
            ->with('success', 'User berhasil ditambahkan.');
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:superadmin,admin,user',
            'password' => 'nullable|string|min:6',
        ]);

        $data = [
            'username' => $validated['username'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect()
            ->route('admin.users')
            ->with('success', 'User berhasil diperbarui.');
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);

        if (Auth::id() === $user->id) {
            return redirect()
                ->route('admin.users')
                ->with('error', 'Akun yang sedang login tidak bisa dihapus.');
        }

        if ($user->role === 'superadmin') {
            return redirect()
                ->route('admin.users')
                ->with('error', 'Akun superadmin tidak bisa dihapus melalui halaman ini.');
        }

        $user->delete();

        return redirect()
            ->route('admin.users')
            ->with('success', 'User berhasil dihapus.');
    }
    public function finance()
{
    return view('admin.finance.index');
}

public function expenses()
{
    return view('admin.expenses.index');
}

public function reports()
{
    return view('admin.reports.index');
}
}
