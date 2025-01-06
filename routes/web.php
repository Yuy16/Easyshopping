<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\welcomeController; // Import the WelcomeController

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

    // Shopping Management Route (Corrected)
    Route::get('/admin/create', [ShoppingManagementController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [ShoppingManagementController::class, 'store'])->name('admin.store');
    Route::get('/admin/catalog',[ShoppingManagementController::class,'catalog'])->name('admin.catalog');
    // routes/web.php
Route::get('/admin/edit/{id}', [ShoppingManagementController::class, 'edit'])->name('admin.edit');
Route::put('/admin/update/{id}', [ShoppingManagementController::class, 'update'])->name('admin.update');
Route::get('/admin/delete/{id}', [ShoppingManagementController::class, 'destroy'])->name('admin.delete');

});

// Public Routesss
// Define a public route named 'home' that points to the shoppers home or landing page
require __DIR__.'/auth.php';

Route::get('/home', function () {
    return view('shoppers.home');  // Ensure that you have a 'shop.home' view created
})->name('home');
