@extends('layouts.navbar')

@section('content')
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
        </div>
    </div>
</div>
@endsection