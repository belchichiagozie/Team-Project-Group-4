@extends('layouts.navbar')

@section('content')
    <div class="books-slider">
        <div class="wrapper">
            <a href="#"><img src="/images/{{$book->file}}" alt="{{$book->Book_ID}}"></a>
        </div>
    </div>

    <div class="reviews-section">
        <button>
            <a href="{{ url('add-review/'.$book->Book_ID) }}" class="reviews-button">Write a Review</a>
        </button>

        <div class="reviews-body">
            <h3 for="reviews">Reviews</h3>
            <p>This is a review</p>
        </div>

    </div>


    <!-- js file -->
    <script src="/js/products.js">
    </script>
</body>

<!-- swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
@endsection
