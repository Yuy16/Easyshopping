<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Order Management System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-100">
    <div class="relative min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('welcome') }}" class="text-2xl font-bold text-indigo-600">
                                OrderPro
                            </a>
                        </div>
                    </div>

                    <!-- Authentication Links -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" 
                                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                    Dashboard
                                </a>
                            @else
                                <div class="space-x-4">
                                    <a href="{{ route('login') }}" 
                                       class="text-sm text-gray-700 dark:text-gray-500 underline">
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" 
                                           class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                            Register
                                        </a>
                                    @endif
                                </div>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                        Streamline Your Order Management
                    </h1>
                    <p class="text-xl text-gray-600 mb-8">
                        Effortlessly track, manage, and process orders with our intuitive User Order Management System.
                    </p>
                    <div class="flex space-x-4">
                        @auth
                            <a href="{{ route('dashboard') }}" 
                               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" 
                               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Get Started
                            </a>
                            <a href="{{ route('login') }}" 
                               class="inline-flex items-center px-6 py-3 border border-2 border-indigo-600 text-base font-medium rounded-md text-indigo-600 hover:bg-indigo-50">
                                Log In
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Feature Illustration -->
                <div class="hidden md:block">
                    <div class="bg-white rounded-lg shadow-xl p-6">
                        <div class="grid grid-cols-3 gap-4">
                            <div class="bg-indigo-100 rounded-lg p-4 transform hover:scale-105 transition duration-300">
                                <svg class="w-12 h-12 text-indigo-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                                <p class="text-center mt-2 text-sm text-indigo-800">Order Tracking</p>
                            </div>
                            <div class="bg-green-100 rounded-lg p-4 transform hover:scale-105 transition duration-300">
                                <svg class="w-12 h-12 text-green-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <p class="text-center mt-2 text-sm text-green-800">Payment Management</p>
                            </div>
                            <div class="bg-purple-100 rounded-lg p-4 transform hover:scale-105 transition duration-300">
                                <svg class="w-12 h-12 text-purple-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                <p class="text-center mt-2 text-sm text-purple-800">Inventory Control</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow-md">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-gray-500 text-sm">
                    &copy; {{ date('Y') }} OrderPro. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
