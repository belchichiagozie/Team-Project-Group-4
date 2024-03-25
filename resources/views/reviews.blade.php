@extends('layouts.navbar')

@section('content')    
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
@endsection