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
            <div class="book-name" id="book-name">{{$book->Title}}</div>
        </div>
        <div class="details-middle">
            <div class="book-genre" id="book-genre">Book Genre: {{$book->Genre}}</div>
            <div class="book-author">The author of this book is {{$book->Author}}</div>
            <div class="stock-amount">We have {{$book->Stock}} in stock!</div>
        </div>
        <div class="details-bottom">
            <button class="add-to-favorites">Add to Favorites</button>
            <form action="{{ route('basket.add') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="Book_ID" value="{{ $book->Book_ID }}">
                        <input type="hidden" name="Quantity" value="1">
                        <button class="add-to-basket">Add to Basket</button>
            </form>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
<!-- <div class="container">
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
</div> -->
@if ($canReview) 
<div class="create-review-container">
    <div class="crc">
    <div class="crc-heading">
        <h2>Leave a review for {{$book->Title}}</h2>
    </div>
    <form action="{{ url('add-review/'.$book->Book_ID) }}" method="POST">
        @csrf
    <div class="crc-title">
        <input type="hidden" name="book_id" value="{{ $book->Book_ID }}">
        <textarea class="form-control" name="review_title" id="review" cols="30" rows="1" placeholder="Title"></textarea>
    </div>
    <div class="crc-body">
        <textarea class="form-control" name="review_body" id="review" cols="30" rows="5" placeholder="Leave your review here!"></textarea>
    </div>
    <div class="crc-submit-button">
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>

</div>
@else
<div class="create-review-container">
    <div class="crc">
    <div class="crc-heading">
        <h2>You have already left a review for this book</h2>
        <form action="{{ url('delete-review/'.$book->Book_ID) }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->Book_ID }}">
            <button type="submit" class="btn btn-primary">Delete Review</button>
    </div>
    </div>
</div>

@endif

</div>
<div class="right-column">
    <div class="mini-columns">
    <h1 class="title">REVIEWS</h1>
    @foreach($reviews as $review)
        <div class="review-card">
            <div class="review-card-top">
                <div class="review-card-title">
                <h3>Title: {{$review->Title}}</h3>
                </div>
                <div class="review-card-user">
                    <h3>
                        {{$review->Customer_Name}}
                    </h3>
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