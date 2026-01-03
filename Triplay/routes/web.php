<?php

use Illuminate\Support\Facades\Route;
use App\Models\Destination;

// Controller Import
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController; 
use App\Http\Controllers\AdminController;       

// =======================================================
// A. ROUTE PUBLIK / GUEST 
// =======================================================

Route::get('/', function () {
    return view('home'); 
})->name('home');

// Halaman List Semua Kegiatan
Route::get('/activities', function () {
    $destinations = Destination::latest()->get(); 
    return view('activities', compact('destinations')); 
})->name('activities');

// Filter Kategori
Route::get('/activities/{category}', [DestinationController::class, 'index'])->name('destinations.index');

// Halaman Detail
Route::get('/destination/{destination}', [DestinationController::class, 'show'])->name('destinations.show');


// =======================================================
// B. ROUTE AUTHENTIKASI & PROTECTED
// =======================================================

Route::middleware('auth')->group(function () {

    // --- DASHBOARD USER BIASA ---
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // --- PROFILE USER ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ===================================================
    // C. ROUTE KHUSUS ADMIN
    // ===================================================
    
    Route::prefix('admin')->group(function () {
        
        // 1. Dashboard Utama Admin
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        // 2. Manajemen Destinasi (CRUD)
        Route::get('/destinations', [AdminController::class, 'destinations'])->name('admin.destinations');
        Route::get('/destinations/create', [AdminController::class, 'createDestination'])->name('admin.destinations.create');
        Route::post('/destinations', [AdminController::class, 'storeDestination'])->name('admin.destinations.store');
        
        // Edit & Update
        Route::get('/destinations/{id}/edit', [AdminController::class, 'editDestination'])->name('admin.destinations.edit');
        Route::put('/destinations/{id}', [AdminController::class, 'updateDestination'])->name('admin.destinations.update');
        
        // Delete
        Route::delete('/destinations/{id}', [AdminController::class, 'destroyDestination'])->name('admin.destinations.destroy');

        // 3. Manajemen User 
        // PERBAIKAN: Menggunakan name('admin.users') agar sesuai dengan panggilan di View
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::post('/users', [AdminController::class, 'storeUser'])->name('admin.users.store'); // <-- TAMBAH INI
        Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update'); // <-- TAMBAH INI
        Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
    });

});

require __DIR__.'/auth.php';