<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Catalog') }}
        </h2>
    </x-slot>
    <style>
        /* Styles copied from your code */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .header-bar {
            background-color: #1e3a8a;
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
            color: #1e3a8a;
        }

        .tabs {
            display: flex;
            justify-content: space-around;
            background-color: #f59e0b;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .tab {
            font-size: 16px;
            color: #1e3a8a;
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

        .img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        {
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
            background-color: #1e3a8a;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
        }

        .book-card button {
            background-color: #e3342f;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .book-card button:hover {
            background-color: #cc1f1a;
        }
    </style>


    <div class="main-container">
        <!-- Page Title -->
        <h1 class="page-title">Product Catalog</h1>

        <!-- Display success message if exists -->
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <!-- Product Grid -->
        <div class="book-grid">
            @foreach ($products as $product)
                <div class="book-card">
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                    <div class="book-title">{{ $product->name }}</div>
                    <div class="book-price">RM{{ number_format($product->price, 2) }}</div>
                    
                    <!-- Availability Status -->
                    <div class="book-availability">
                        <strong>Status:</strong> 
                        {{ $product->is_active ? 'Available' : 'Unavailable' }}
                    </div>

                    <!-- Edit button -->
                    <a href="{{ route('admin.edit', $product->id) }}" class="btn-edit">Edit</a>
                    
                    <!-- Delete Form -->
                    <form action="{{ route('admin.delete', $product->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE') <!-- This is crucial for sending the DELETE request -->
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
