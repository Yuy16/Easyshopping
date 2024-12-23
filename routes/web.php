<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\welcomeController; // Import the WelcomeController

// Define the route for the root URL using the WelcomeController
Route::resource('shopper',welcomeController::class);
