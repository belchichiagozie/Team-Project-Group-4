<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$book->Title}}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" type="text/css" href="/css/products.css"/>
</head>
<body>
    <!-- header -->
    <header class="header">
        <div class="header-1">
            <img src="/images/logo.png" alt="Your Logo" class="logo-image">
            <a href="#" class="logo"> </i> BookTour</a>

            <form action="" class="search-form">
            <input type="search" name="" placeholder="what's your next adventure? search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
            <div id="login-btn" class="fas fa-user"></div>
        </div>
    </div>
    <div class="header-2">
        <nav class="navbar">
            <a href="/products">Home</a>
            <a href="#New Arrivals">New Arrivals</a>
            <a href="#Best Sellers">Best Sellers</a>
            <a href="#Genres">Genres</a>
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

    <div class="books-slider">
        <div class="wrapper">
            <a href="#"><img src="/images/{{$book->file}}" alt="{{$book->Book_ID}}"></a>
        </div>
    </div>


    <!-- js file -->
    <script src="/js/products.js">
    </script>
</body>

<!-- swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>