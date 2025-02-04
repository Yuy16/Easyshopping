<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected Product</title>
</head>
<body>

    <h1>You Selected: {{ $product->name }}</h1>
    <p>Price: RM{{ number_format($product->price, 2) }}</p>
    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">

    <a href="{{ route('home') }}">Back to Products</a>

</body>
</html>
