<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our E-Shop!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        header h1 {
            margin: 0;
        }
        .home-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #fff;
            border: 1px solid #007bff;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            color: #007bff;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .home-btn:hover {
            background-color: #007bff;
            color: white;
        }
        .category-select {
            margin: 20px;
            display: flex;
            justify-content: center;
        }
        .category-select select {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #007bff;
            color: #333;
        }
        .product-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
            justify-items: center;
        }
        .product-card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 250px;
            text-align: center;
        }
        .product-card img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        .product-card h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .product-card p {
            margin: 5px 0;
            font-size: 14px;
        }
        .product-card .status {
            font-weight: bold;
            color: #28a745;
        }
        .product-card .status.unavailable {
            color: #dc3545;
        }
    </style>
</head>
<body>

    <!-- Home Button -->
    <a href="{{ route('home') }}">
        <button class="home-btn">🏠 Home</button>
    </a>

    <header>
        <h1>Welcome to Our E-Shop!</h1>
    </header>

    <!-- Category Selection Dropdown -->
    <div class="category-select">
        <form action="{{ route('shoppers.products') }}" method="GET">
            <label for="category">Choose a Category: </label>
            <select name="category" id="category" onchange="this.form.submit()">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </form>
    </div>

    <h2>Our Products</h2>

    <!-- Display products -->
    <div class="product-list">
        @if($products->isEmpty())
            <p>No products available.</p>
        @else
            @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>Price: RM{{ number_format($product->price, 2) }}</p>
                       <p><strong>Description:</strong> {{ $product->description }}</p> <!-- Added description -->
                    <p class="status {{ $product->is_active ? '' : 'unavailable' }}">
                        Status: {{ $product->is_active ? 'Available' : 'Unavailable' }}
                    </p>
                     <!-- Select Product Button -->
                     <form action="{{ route('product.select') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit">Select Product</button>
                    </form>
                </div>
            @endforeach
        @endif
    </div>

</body>
</html>
