<!-- resources/views/products/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
</head>
<body>

<h1>Product Catalog</h1>

<div class="product-list">
    @foreach($products as $product)
        <div class="product-card">
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="product-image">
            <h2>{{ $product->name }}</h2>
            <p>Price: RM{{ number_format($product->price, 2) }}</p>
            <p>Status: {{ $product->is_active ? 'Available' : 'Unavailable' }}</p>
        </div>
    @endforeach
</div>

</body>
</html>
