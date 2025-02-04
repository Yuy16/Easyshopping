<?php

<<<<<<< HEAD
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingManagementController;
use App\Http\Controllers\OrderManagementController;
use App\Http\Controllers\ProductController;
=======
use App\Http\Controllers\Controller;
>>>>>>> d25422bb105593cf395b9651224e553c9d291c1c
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
    
    // Corrected routes for editing and deleting products
    Route::get('/admin/edit/{id}', [ShoppingManagementController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/update/{id}', [ShoppingManagementController::class, 'update'])->name('admin.update');
    Route::delete('/admin/delete/{id}', [ShoppingManagementController::class, 'destroy'])->name('admin.delete');
});

<<<<<<< HEAD

// Public Route
=======
// Public Routesss
>>>>>>> d25422bb105593cf395b9651224e553c9d291c1c
// Define a public route named 'home' that points to the shoppers home or landing page
require __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/home', [ProductController::class, 'index'])->name('home');  // Pass products from controller to view

Route::get('/shoppers/products', [ProductController::class, 'product'])->name('shoppers.products');
// Correct the route to use the 'index' method
Route::get('/shoppers/products', [ProductController::class, 'index'])->name('shoppers.products');

Route::post('/product/select', [ProductController::class, 'selectProduct'])->name('product.select');
Route::get('/product/selected', [ProductController::class, 'showSelectedProduct'])->name('product.selected');


