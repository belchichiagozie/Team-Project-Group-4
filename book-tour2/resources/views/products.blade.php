@extends('layouts.navbar')

@section('content')

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
                <a href="#"><img src="/images/{{$books[0]->file}}" alt=""></a>
                <a href="#"><img src="/images/{{$books[1]->file}}" alt=""></a>
                <a href="#"><img src="/images/{{$books[2]->file}}" alt=""></a>
            </div>
        </div> 
</section>

<!-- Products: New Arrivals Section -->
<section class="arrivals" id="New Arrivals">
    <h1 class="heading"> <span> new arrivals</span> </h1>

    <div class="swiper arrivals-slider">
        <div class="swiper-wrapper">
        @foreach ($books as $book)
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
        @endforeach
        
        
    </div>
</div>

</section>
<!-- Products: New Arrivals Section -->


<!--Products -->
@endsection