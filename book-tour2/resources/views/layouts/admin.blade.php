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



    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css file -->

    <!-- Scripts -->
 <link rel="stylesheet" href="{{ mix('css/app.css') }}">
 <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body>
<div id="logo"></div>
<div id="layout" class="bg-sky-200"></div>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>