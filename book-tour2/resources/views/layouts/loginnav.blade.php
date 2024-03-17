<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookTour</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" type="text/css" href="/css/products.css" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
 <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="overflow-x-hidden w-screen">
    <!-- header -->
    <header class="header">
        <div class="header-1">
            <img src="/images/logo.png" alt="Your Logo" class="logo-image">
            <a href="/products" class="logo"> </i> BookTour</a>

            <form action="{{ route('catalog.index') }}" method="GET" id="searchForm" class="search-form">
                <input type="search" name="searchInput" placeholder="What's your next adventure? Search here..." id="search-box">
                <label for="search-box" class="fas fa-search"></label>
                
                <input type="hidden" name="sort" value="title">
            </form>

        <div class="icons">
        <div id="search-btn" class="fas fa-search"></div>

            <a href="#" class="fas fa-heart"></a>
            <a href="/basket/view" class="fas fa-shopping-cart"></a>
            <div id="login-btn" class="fas fa-user dropdown">
                <div class="dropdown-content">
                    @auth
                    <a href="{{ route('logout') }}" id="xstext" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
       {{ __('Logout') }} </a>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    @endauth
    @guest
    <a href="/home" id="xstext">Log In</a>
    @endguest
                    
                    
                </div>
            </div>
            </div>
        </div>
        <!--navbar-->
        <div class="header-2">
            <nav class="navbar">
                <a href="/products">Home</a>
                <a href="#New Arrivals">New Arrivals</a>
                <a href="#Best Sellers">Best Sellers</a>
                <div class="genre-dropdown">
                    <a href="#Genres">Genres &#9662; </a>
                    <ul class="dropdown">
                        <li class="dropdown-subsection"><a href="#">Fiction &#9656; </a>
                        <ul class="subsection">
                            <li><a href="#">Fantasy</a></li>
                            <li><a href="#">Mystery & Thriller</a></li>
                            <li><a href="#">Romance</a></li>
                            <li><a href="#">Science Fiction</a></li>
                            <li><a href="#">Horror</a></li>
                            <li><a href="#">Children's</a></li>
                            <li><a href="#">Myths & Legends</a></li>
                            <li><a href="#">Manga</a></li>
                        </ul>
                        </li>
                    <li class="dropdown-subsection"><a href="#">Non-Fiction &#9656; </a>
                    <ul class="subsection">
                            <li><a href="#">History</a></li>
                            <li><a href="#">Biography & Autobiography</a></li>
                            <li><a href="#">Science</a></li>
                            <li><a href="#">True Crime</a></li>
                            <li><a href="#">Philosophy</a></li>
                            <li><a href="#">Self-Help</a></li>
                            <li><a href="#">Business, Finance & Law</a></li>
                            <li><a href="#">Health & Wellness</a></li>
                        </ul>
                        </li>
                    </ul>
                </div>
                <a href="#Special Offers">Special Offers</a>
                <a href="#Reviews">Reviews</a>

            </nav>
        </div>

    </header>
    <!-- header -->

    <!-- lower navbar -->
    <nav class="lower-navbar">
        <a href="/products" class="fas fa-home"></a>
        <a href="#Featured" class="fas fa-list"></a>
        <a href="#New Arrivals" class="fas fa-tags"></a>
        <a href="#Best Sellers" class="fas fa-heart"></a>
        <a href="#Special Offers" class="fas fa-user"></a>
        <a href="#Reviews" class="fas fa-comments"></a>

    </nav>
    <script src="/js/products.js">
    </script>
    <!-- swiper functioning link -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="/js/products.js">
    </script>
    <div class="bg-neutral-100 overflow-x-hidden w-full h-full flex grow items-center justify-center bg-slate-50 py-5 text-white">
    @yield('content')
    </div>
</body>
