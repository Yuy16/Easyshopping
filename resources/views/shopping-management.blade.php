<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Shopping Management') }}
        </h2>
    </x-slot>

    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; /* Light gray background */
        }

        .header-bar {
            background-color: #1e3a8a; /* Dark Blue */
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
        }

        .header-bar img {
            height: 40px;
        }

        .main-container {
            padding: 20px;
        }

        .page-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 20px;
            color: #1e3a8a; /* Dark Blue */
        }

        .tabs {
            display: flex;
            justify-content: space-around;
            background-color: #f59e0b; /* Yellow */
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .tab {
            font-size: 16px;
            color: #1e3a8a; /* Dark Blue */
            font-weight: bold;
            cursor: pointer;
        }

        .tab:hover {
            text-decoration: underline;
        }

        .content-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .search-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-bar input,
        .search-bar select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .book-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .book-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .book-card .book-title {
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0;
            color: #333;
        }

        .book-card .book-author {
            font-size: 14px;
            color: #555;
        }

        .book-card .book-price {
            margin-top: 10px;
            background-color: #1e3a8a; /* Dark Blue */
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
        }
    </style>

    <div class="main-container">
        <!-- Header Section -->
        <div class="header-bar">
            <h1>Easy Shopping</h1>
            <img src="{{ asset('path/to/account-icon.png') }}" alt="Account Icon">
        </div>

        <!-- Page Title -->
        <h1 class="page-title">Shopping Management</h1>

        <!-- Tabs  You can achieve this by wrapping the "Add New Product" span in a link (<a> tag) that leads to the route for creating a new product.-->
        <div class="tabs">
            <a href="{{ route('admin.create') }}" class="tab">Add New Product</a>
            <a href="{{ route('admin.catalog') }}" class="tab">View Catalog</a>
            <span class="tab">Delete Product</span>
        </div>
        

        <!-- Content Section -->
        <div class="content-container">
            <!-- Search Bar -->
            <div class="search-bar">
                <input type="text" placeholder="Search book by genre, author, and date">
                <select>
                    <option>Sort by Alphabetically A-Z</option>
                    <option>Sort by Price (Low to High)</option>
                    <option>Sort by Price (High to Low)</option>
                </select>
            </div>

           
        </div>
    </div>
</x-app-layout>
