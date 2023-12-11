@extends('layouts.navbar')

@section('content')
    <div class="books-slider">
        <div class="wrapper">
            <a href="#"><img src="/images/{{$book->file}}" alt="{{$book->Book_ID}}"></a>
        </div>
    </div>

@endsection