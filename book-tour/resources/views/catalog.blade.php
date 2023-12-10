@extends('layouts.app')

<!DOCTYPE html>
<html lang="en"> <!-- header from main home page products blade aesthetic-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookTour Catalogue</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" type="text/css" href="/css/products.css"/>
</head>

@section('content')
  
    <body>
        <section class="catalog" id="Catalog">
        
            <h1>Catalogue Page</h1>


            <form action="{{ route('catalog.index') }}" method="GET" id="searchForm">
                <label for="sort">Sort By:</label>
                <!--main drop down boxs -->

                <select name="sort" id="sort" onchange="toggleInput()">
                    <option value="title">Title</option>
                    <option value="genre">Genre</option>
                    <option value="author">Author</option>
                    <option value="price">Price</option>
                </select>
        
                <label for="searchInput" id="searchLabel" style="display: none;">Title:</label>
                <input type="text" name="searchInput" id="searchInput" style="display: none;">

                <button type="submit">Search</button>
            </form>
                
            <div class="arrivals-slider">
                @foreach ($books as $book)
                    <a href="/products/{{ $book->Book_ID }}" class="book-box">
                        <div class="image">
                            <img src="/images/{{ $book->file }}" alt="{{ $book->Title }}">
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
            </div>
        </section>

    

        <script>
            
            document.addEventListener('DOMContentLoaded', function() 
            {
                toggleInput();
            });

            function toggleInput() 
            {

                var sortselect = document.getElementById('sort');

                
                var input = document.getElementById('searchInput');
                var label = document.getElementById('searchLabel');
            
            
            

                //reset the STATE!
                input.style.display = 'none';
                label.style.display = 'none';
            

                
                if (sortselect.value === 'genre') 
                {
                    input.style.display = 'inline-block';
                    
                    label.innerText = 'Genre: ';
                    label.style.display = 'inline-block';
                
                } 
                else if (sortselect.value === 'author') 
                {
                    input.style.display = 'inline-block';
                    
                    label.innerText = 'Author: ';
                    label.style.display = 'inline-block';
                    
                } 
                else if (sortselect.value === 'title') 
                {
                    input.style.display = 'inline-block';

                    label.innerText = 'Title: ';
                    label.style.display = 'inline-block';
                
                }
            }
        </script>
    <body>
@endsection
