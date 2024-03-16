@extends('layouts.navbar')

@section('content')
<section class="readinglist">
<body>
    <div class="heading">
        <h1>Reading List</h1>
            <div class="add to basket">
                @foreach($books as $book)
            <div class="box">
                <img src="/images/{{$book->file}}" alt="game of your mind">
                <div class="list">
                <h2>{{$book->Title}}</h2>
                <h3>£{{$book->Price}}</h3>
                <p class="addbtn">
                            <span class="btn1">Add to basket</span>
                        </p>
                        <p class="likebtn">
                        <form action="{{ route('removerl') }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="Book_ID" value="{{ $book->Book_ID }}">
            <button type="submit" class="btn">
                        <i class="fas fa-heart"></i>
</button>
</form>
    <span class="btn2"></span>
</p>
</div>
</div>
@endforeach
    </div>
<!-- <div class="box">
    <img src="/images/bookcover5.png" alt="the spirit">
    <div class="list">
                <h2>The Spirit</h2>
                <h3>Price: £10</h3>
                <p class="addbtn">
                            <span class="btn1">Add to basket</span>
                        </p>
                        <p class="likebtn">
                        <i class="fas fa-heart"></i>
    <span class="btn2"></span>
</p>
</div></div>
    <div class="box">
    <img src="/images/bookcover7.png" alt="robotics">
    <div class="list">
                <h2>Robotics</h2>
                <h3>Price: £10</h3>
                <p class="addbtn">
                            <span class="btn1">Add to basket</span>
                        </p>
                        <p class="likebtn">
                        <i class="fas fa-heart"></i>
    <span class="btn2"></span>
</p>
</div> -->
</div>
    



@endsection