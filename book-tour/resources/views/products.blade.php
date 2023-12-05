<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookTour</title>

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
            <a href="#Home">Home</a>
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
        <a href="#Home" class="fas fa-home"></a>
        <a href="#Featured" class="fas fa-list"></a>
        <a href="#New Arrivals" class="fas fa-tags"></a>
        <a href="#Best Sellers" class="fas fa-heart"></a>
        <a href="#Special Offers" class="fas fa-user"></a>
        <a href="#Reviews" class="fas fa-comments"></a>

    </nav>


    <!-- js file -->
    <script src="/js/products.js">
    </script>
</body>

<!-- swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Home Page: Home Section -->
<section class="Home" id="Home">
    <div class="row">
        <div class="content">
            <h3>Immerse yourself into a new world!</h3>
            <p>One page at a time...</p>
            <a href="#" class="btn">shop now</a>
        </div>    
        
        <div class="books-slider">
            <div class="wrapper">
                <a href="#"><img src="/images/bookcover.png" alt=""></a>
                <a href="#"><img src="/images/bookcover1.png" alt=""></a>
                <a href="#"><img src="/images/bookcover2.png" alt=""></a>
            </div> 
</section>

<!-- Products: New Arrivals Section -->
<section class="arrivals" id="New Arrivals">
    <h1 class="heading"> <span> new arrivals</span> </h1>

    <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">
        
        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover.png" alt="">
            </div>
            <div class="content">
                <h3>Rising Ashes</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>
        
    <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">
        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover1.png" alt="">
            </div>
            <div class="content">
                <h3>Walk into the Shadow</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover2.png" alt="">
            </div>
            <div class="content">
                <h3>In Your Eyes</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover3.png" alt="">
            </div>
            <div class="content">
                <h3>Hide And Seek</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover4.png" alt="">
            </div>
            <div class="content">
                <h3>Game of your Mind</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover5.png" alt="">
            </div>
            <div class="content">
                <h3>The Spirit</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover6.png" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover7.png" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover8.png" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover9.png" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover10.png" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover11.png" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover12.png" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover13.png" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover14.png" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover15.png" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

        <a href="#" class="box">
            <div class="image">
                <img src="/images/bookcover16.png" alt="">
            </div>
            <div class="content">
                <h3>new arrivals</h3>
                <div class="price">£10<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>

</section>
<!-- Products: New Arrivals Section -->



<!--Products -->