<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceOrderController;
use App\Http\Controllers\AdminServiceController;

// ===============================
// PUBLIC ROUTES
// ===============================

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/explore', function () {
    return redirect()->route('activities');
})->middleware('auth')->name('explore');

Route::get('/activities', [DestinationController::class, 'index'])
    ->name('activities');

Route::get('/activities/{category}', [DestinationController::class, 'category'])
    ->name('destinations.category');

Route::get('/destinations/{category}', [DestinationController::class, 'category'])
    ->name('destinations.index');

Route::get('/destination/{destination}', [DestinationController::class, 'show'])
    ->name('destinations.show');

Route::get('/services', [ServiceController::class, 'index'])
    ->name('services.index');

Route::get('/about', function () {
    return redirect(route('home') . '#about');
})->name('about');

Route::get('/contact', function () {
    return redirect(route('home') . '#contact');
})->name('contact');


// ===============================
// AUTH USER ROUTES
// ===============================

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user && in_array($user->role, ['admin', 'superadmin'])) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('home');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/wallet', function () {
        return view('user.wallet');
    })->name('wallet.index');

    Route::get('/orders', function () {
        return view('user.orders');
    })->name('orders.index');

    Route::get('/booking/{destination}', [BookingController::class, 'create'])
        ->name('bookings.create');

    Route::post('/booking/{destination}', [BookingController::class, 'store'])
        ->name('bookings.store');

    Route::get('/services/{service}/order', [ServiceOrderController::class, 'create'])
        ->name('service-orders.create');

    Route::post('/services/{service}/order', [ServiceOrderController::class, 'store'])
        ->name('service-orders.store');
});


// ===============================
// ADMIN + SUPERADMIN ROUTES
// ===============================

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');

    // DESTINATIONS
    Route::get('/destinations', [AdminController::class, 'destinations'])
        ->name('admin.destinations');

    Route::get('/destinations/create', [AdminController::class, 'createDestination'])
        ->name('admin.destinations.create');

    Route::post('/destinations', [AdminController::class, 'storeDestination'])
        ->name('admin.destinations.store');

    Route::get('/destinations/{id}/edit', [AdminController::class, 'editDestination'])
        ->name('admin.destinations.edit');

    Route::put('/destinations/{id}', [AdminController::class, 'updateDestination'])
        ->name('admin.destinations.update');

    Route::delete('/destinations/{id}', [AdminController::class, 'destroyDestination'])
        ->name('admin.destinations.destroy');

    // SERVICES
    Route::get('/services', [AdminServiceController::class, 'index'])
        ->name('admin.services.index');

    Route::get('/services/create', [AdminServiceController::class, 'create'])
        ->name('admin.services.create');

    Route::post('/services', [AdminServiceController::class, 'store'])
        ->name('admin.services.store');

    Route::get('/services/{service}/edit', [AdminServiceController::class, 'edit'])
        ->name('admin.services.edit');

    Route::put('/services/{service}', [AdminServiceController::class, 'update'])
        ->name('admin.services.update');

    Route::delete('/services/{service}', [AdminServiceController::class, 'destroy'])
        ->name('admin.services.destroy');

    // USERS
    Route::get('/users', [AdminController::class, 'users'])
        ->name('admin.users');

    Route::post('/users', [AdminController::class, 'storeUser'])
        ->name('admin.users.store');

    Route::put('/users/{id}', [AdminController::class, 'updateUser'])
        ->name('admin.users.update');

    Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])
        ->name('admin.users.destroy');
});


// ===============================
// SUPERADMIN ONLY ROUTES
// ===============================

Route::middleware(['auth', 'superadmin'])->prefix('admin')->group(function () {

    Route::get('/finance', [AdminController::class, 'finance'])
        ->name('admin.finance');

    Route::get('/expenses', [AdminController::class, 'expenses'])
        ->name('admin.expenses');

    Route::get('/reports', [AdminController::class, 'reports'])
        ->name('admin.reports');
});

require __DIR__.'/auth.php';
