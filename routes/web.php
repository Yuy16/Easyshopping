<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingManagementController;
use App\Http\Controllers\OrderManagementController;
use App\Http\Controllers\WelcomeController;  // Make sure this is included

// Define the route for the root URL using the WelcomeController
//Route::resource('shopper', WelcomeController::class);

Route::get('/', function () {
    return view('welcome');
});

// Public Route for Shopper's interface (e.g., landing page or product listing)
// Route::get('/shoppers', function () {
//     return view('shoppers.products');  // Ensure this view exists at resources/views/shoppers/home.blade.php
// })->name('shoppers.products');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/book-management', [ShoppingManagementController::class, 'index'])->name('book-management');

    // Order Management Route
    Route::get('/order-management', [OrderManagementController::class, 'index'])->name('order-management');

    // Shopping Management Routes
    Route::get('/admin/create', [ShoppingManagementController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [ShoppingManagementController::class, 'store'])->name('admin.store');
    Route::get('/admin/catalog', [ShoppingManagementController::class, 'catalog'])->name('admin.catalog');
    Route::get('/admin/edit/{id}', [ShoppingManagementController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{id}', [ShoppingManagementController::class, 'update'])->name('admin.update');
    Route::get('/admin/delete/{id}', [ShoppingManagementController::class, 'destroy'])->name('admin.delete');
});


// Public Route
Route::get('/home', function () {
    return view('shoppers.home');  // Ensure that you have a 'shoppers.home' view created
})->name('home');


    // Order routes
    Route::resource('orders', OrderController::class);
    
    // Payment routes
    Route::post('payments/{order}', [PaymentController::class, 'process'])->name('payments.process');
    
    // Account routes
    Route::get('account/settings', [AccountController::class, 'settings'])->name('account.settings');
    Route::put('account/settings', [AccountController::class, 'update'])->name('account.update');
});

// Auth Routes (Login, Registration)
require __DIR__.'/auth.php';
