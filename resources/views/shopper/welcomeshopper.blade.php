<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ $shopName }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Welcome to {{ $shopName }}!</h1>
        <p>Your ultimate shopping destination. Find everything you need here!</p>
    </header>
    <main>
        <p>Enjoy exclusive offers and amazing products.</p>
    </main>
    <footer>
        <p>&copy; {{ date('Y') }} {{ $shopName }}. All rights reserved.</p>
    </footer>
</body>
</html>
