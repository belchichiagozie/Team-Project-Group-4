<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
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
            <a href="/products" class="logo"> </i> BookTour</a>

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
            <a href="/products#New Arrivals">New Arrivals</a>
            <a href="/products#Best Sellers">Best Sellers</a>
            <a href="#Genres">Genres</a>
            <a href="#Special Offers">Special Offers</a>
            <a href="/reviews">Reviews</a>

        </nav>
    </div>

    </header>

    
    <div class="container">
        <div class="row">
            <div>
                <div class="card">
                    <div class="body">
                        <h2>You are writing a review for {{$book->Title}}</h2>
                        <form action="{{ url('add-review/'.$book->Book_ID) }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $book->BookID }}">
                            <textarea class="form-control" name="review" id="review" cols="30" rows="10"></textarea>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>