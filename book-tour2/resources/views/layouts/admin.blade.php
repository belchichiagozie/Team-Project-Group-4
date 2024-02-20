<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Book Tour</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" type="text/css" href="/css/products.css"/>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="lower-navbar">
        <a href="#Home" class="fas fa-home"></a>
        <a href="#Featured" class="fas fa-list"></a>
        <a href="#New Arrivals" class="fas fa-tags"></a>
        <a href="#Best Sellers" class="fas fa-heart"></a>
        <a href="#Special Offers" class="fas fa-user"></a>
        <a href="#Reviews" class="fas fa-comments"></a>

    </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>