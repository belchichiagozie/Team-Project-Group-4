@extends('layouts.navbar')

@section('content')
<div class="columns">
<div class="left-column">
<div class="image-details">
    <div class="left-side">
        <div class="product-image">
            <img src="/images/{{$book->file}}" alt="{{$book->Book_ID}}" width="300px" height="380px">
        </div>
    </div>
    <div class="right-side">
        <div class="details-top">
            <div class="name" id="name">[Name]</div> <!-- Placeholder for user's name -->
            <div class="book-name" id="book-name">{{$book->Title}}</div>
        </div>
        <div class="details-middle">
            <div class="book-genre" id="book-genre">Book Genre: {{$book->Genre}}</div>
            <div class="book-author">The author of this book is {{$book->Author}}</div>
            <div class="stock-amount">We have {{$book->Stock}} in stock!</div>
        </div>
        <div class="details-bottom">
            <button class="add-to-favorites">Add to Favorites</button>
            <button class="add-to-basket">Add to Basket</button>
            <button class="add-review" onclick="window.location.href='/add-review/{{$book->Book_ID}}'">Leave a Review</button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div>
            <div class="card">
                <div class="body">
                    <h2>You are writing a review for {{$book->Title}}</h2>
                    <form action="{{ url('add-review/'.$book->Book_ID) }}" method="POST">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->Book_ID }}">
                        <textarea class="form-control" name="review_title" id="review" cols="30" rows="1" placeholder="Title"></textarea>
                        <textarea class="form-control" name="review_body" id="review" cols="30" rows="10" placeholder="Leave your review here!"></textarea>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="right-column">
    <div class="mini-columns">
    <h1 class="title">REVIEWS</h1>
    @foreach($reviews as $review)
        <div class="review-card">
            <div class="review-card-top">
                <div class="review-card-title">
                <h1>{{$review->Title}}</h1>
                </div>
                <div class="review-card-user">
                    <h1>
                        {{$review->Customer_ID}}
                    </h1>
                </div>
            </div>
            <div class="review-card-bottom">
                <div class="content">
                <p>{{$review->Body}}</p>
                </div>
            </div>
        </div>
        @endforeach
        <!-- <div class="review-card">
        <div class="review-card-title">
            <h1>Review2</h1>
        </div>
        <div class="review-card-bottom">
            <div class="content">
                <p>Content Goes Here</p>
            </div>
        </div>
        </div> -->

    </div>

</div>
</div>
@endsection