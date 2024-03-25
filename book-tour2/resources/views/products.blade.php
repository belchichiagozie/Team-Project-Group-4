@extends('layouts.navbar')

@section('content')

<!-- Products Page: Home Section -->
<section class="Home" id="Home">
    <div class="row">
        <div class="content">
            <h3>Immerse yourself into a new world!</h3>
            <p>One page at a time...</p>
            <a href="/catalog" class="btn">shop now</a>
        </div>    
        
        <div class="books-slider">
            <div class="wrapper">
                <a href="#"><img src="/images/bookcover.png" alt=""></a>
                <a href="#"><img src="/images/bookcover1.png" alt=""></a>
                <a href="#"><img src="/images/bookcover2.png" alt=""></a>
            </div>
        </div> 
</section>

<!-- Products Page: New Arrivals Section -->
<section class="arrivals" id="New Arrivals">
    <h1 class="heading"> <span> new arrivals</span> </h1>
    @if($user)
    <p>Welcome, {{ $user->name }}</p>
@else
    <p>You are not logged in.</p>
@endif

    <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">
        @foreach($books as $book)
            <a href="/products/{{$book->Book_ID}}" class="swiper-slide box">
                <div class="image">
                    <img src="/images/{{$book->file}}" alt="{{$book->Book_ID}}">
                </div>
                <div class="content">
                    <h3>{{ $book->Title }}</h3>
                    <div class="price">£{{ $book->Price }}<span>£12</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>
            @endforeach
            <!-- <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="/images/bookcover4.png" alt="">
                </div>
                <div class="content">
                    <h3>game of your mind</h3>
                    <div class="price">£10 <span>£12</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>


            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="/images/bookcover5.png" alt="">
                </div>
                <div class="content">
                    <h3>the spirit</h3>
                    <div class="price">£10 <span>£12</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="/images/bookcover6.png" alt="">
                </div>
                <div class="content">
                    <h3>artifical forces</h3>
                    <div class="price">£10 <span>£12</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="/images/bookcover7.png" alt="">
                </div>
                <div class="content">
                    <h3>robotics</h3>
                    <div class="price">£10 <span>£12</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="swiper arrivals-slider">
            <div class="swiper-wrapper">

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="/images/bookcover8.png" alt="">
                </div>
                <div class="content">
                    <h3>"Adventures of the space crew"</h3>
                    <div class="price">£10 <span>£12</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="/images/bookcover9.png" alt="">
                </div>
                <div class="content">
                    <h3>the dreams</h3>
                    <div class="price">£10 <span>£12</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="/images/bookcover10.png" alt="">
                </div>
                <div class="content">
                    <h3>the story of a prince</h3>
                    <div class="price">£10 <span>£12</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="/images/bookcover12.png" alt="">
                </div>
                <div class="content">
                    <h3>time travel</h3>
                    <div class="price">£10 <span>£12</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="/images/bookcover14.png" alt="">
                </div>
                <div class="content">
                    <h3>the way to success</h3>
                    <div class="price">£10 <span>£12</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a> -->

        </div>

    </div>

</section>

<!-- Products Page: Special Offers Section -->
<section class="specialoffers" id="Special Offers">
<div class="offers-container">
    <section class="offers">
        <div class="content">
            <h3>BookTour Deals</h3>
            <h1>50% off new arrivals!</h1>
            <p>Half price on all best sellers!</p>
            <a href="#" class="btn">shop special offers</a>
        </div>

        <div class="image">
            <img src="/images/bookstore.png" alt="">
        </div>
    </section>
</div>

<!-- Products Page: Best Sellers section -->
<section class="bestsellers" id="Best Sellers">
    <h1 class="heading"> <span>Best Sellers</span> </h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif
    <div class="swiper bestsellers-slider">
        <div class="swiper-wrapper">
            @foreach($books as $book)
            <div class="swiper-slide box">
                <div class="icons">
                    <a href="/products/{{$book->Book_ID}}" class="fas fa-search"></a>
                    <form action="{{ route('addrl') }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="Book_ID" value="{{ $book->Book_ID }}">
            <button type="submit" class="btn">
                    <span class="fas fa-heart"></span>
</button>
</form>

                    <a href="#" class="fas fa-eye"></a>
                    <form action="{{ route('basket.add') }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="Book_ID" value="{{ $book->Book_ID }}">
            <input type="hidden" name="Quantity" value="1">
            <button type="submit" class="btn">
            <span class="fas fa-shopping-cart"></span>
</button>
</form>
                    
                </div>
                <div class="image">
                    <img src="/images/{{$book->file}}" alt="">
                </div>
                <div class="content">
                    <h3>{{$book->Title}}</h3>
                    <div class="price">£{{$book->Price}}</div>
                    <form action="{{ route('basket.add') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="Book_ID" value="{{ $book->Book_ID }}">
                        <input type="hidden" name="Quantity" value="1">
                        <button type="submit" class="btn">Add to Basket</button>
                    </form>
                </div>
            </div>
            @endforeach

            <!-- <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="image">
                    <img src="/images/bookcover1.png" alt="">
                </div>
                <div class="content">
                    <h3>walk into the shadow</h3>
                    <div class="price">£10 <span> £12 </span></div>
                    <a href="#" class="btn">Add to Basket</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="image">
                    <img src="/images/bookcover2.png" alt="">
                </div>
                <div class="content">
                    <h3>in your eyes</h3>
                    <div class="price">£10 <span> £12 </span></div>
                    <a href="#" class="btn">Add to Basket</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="image">
                    <img src="/images/bookcover3.png" alt="">
                </div>
                <div class="content">
                    <h3>hide and seek</h3>
                    <div class="price">£10 <span> £12 </span></div>
                    <a href="#" class="btn">Add to Basket</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="image">
                    <img src="/images/bookcover4.png" alt="">
                </div>
                <div class="content">
                    <h3>game of your mind</h3>
                    <div class="price">£10 <span> £12 </span></div>
                    <a href="#" class="btn">Add to Basket</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="image">
                    <img src="/images/bookcover5.png" alt="">
                </div>
                <div class="content">
                    <h3>the spirit</h3>
                    <div class="price">£10 <span> £12 </span></div>
                    <a href="#" class="btn">Add to Basket</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="image">
                    <img src="/images/bookcover17.png" alt="">
                </div>
                <div class="content">
                    <h3>Conquest of flames</h3>
                    <div class="price">£10 <span> £12 </span></div>
                    <a href="#" class="btn">Add to Basket</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="image">
                    <img src="/images/bookcover16.png" alt="">
                </div>
                <div class="content">
                    <h3>a lady in the countryside</h3>
                    <div class="price">£10 <span> £12 </span></div>
                    <a href="#" class="btn">Add to Basket</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="image">
                    <img src="/images/bookcover14.png" alt="">
                </div>
                <div class="content">
                    <h3>the way to success</h3>
                    <div class="price">£10 <span> £12 </span></div>
                    <a href="#" class="btn">Add to Basket</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="icons">
                    <a href="#" class="fas fa-search"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-shopping-cart"></a>
                </div>
                <div class="image">
                    <img src="/images/bookcover12.png" alt="">
                </div>
                <div class="content">
                    <h3>time travel</h3>
                    <div class="price">£10 <span> £12 </span></div>
                    <a href="#" class="btn">Add to Basket</a>
                </div>
            </div> -->

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

</section>

<!-- arrivals section ends -->
        <!-- @foreach ($books as $book)
        <a href="/products/{{$book->Book_ID}}" class="box">
            <div class="image">
                <img src="/images/{{$book->file}}" alt="Book {{$book->Book_ID}}">
            </div>
            <div class="content">
                <h3>{{$book->Title}}</h3>
                <div class="price">£{{$book->Price}}<span>£12</span></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>

                </div>
            </div>
        </a>
        @endforeach -->
        
        
    </div>
</div>

</section>
<!-- Products: New Arrivals Section -->

<!-- swiper functioning link -->

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/products.js"></script>

<!--Products -->
@endsection