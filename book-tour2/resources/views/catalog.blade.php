@extends('layouts.navbar')

@section('content')
  
    <body>
        <section class="catalog" id="Catalog">
        
            <h1 style = "font-size: 3rem;">Catalogue Page</h1>


            <form action="{{ route('catalog.index') }}" method="GET" id="searchForm">
                <label for="sort" style = "font-size: 1.5rem;">Sort By:</label>
                <!--main drop down boxs -->

                <select name="sort" id="sort" style = "font-size: 1.5rem;" onchange="toggleInput()">
                    <option value="title">Title</option>
                    <option value="genre">Genre</option>
                    <option value="author">Author</option>
                    <option value="price">Price</option>
                </select>
        
                <label for="searchInput" id="searchLabel" style="display: none; font-size: 1.5rem;">Title:</label>
<input type="text" name="searchInput" id="searchInput" style="display: none; width: 300px; border: 2px solid black; border-radius: 8px;">

                    


                <button type="submit">Search</button>
            </form>
                
            <div class="arrivals-slider">
                @foreach ($books as $book)
                    <a href="/products/{{ $book->Book_ID }}" class="book-box">
                        <div class="image">
                            <img src="/images/{{ $book->file }}" alt="{{ $book->Title }}">
                        </div>

                        <div class="content">
                            <p style="font-size: 1.5rem; font-weight: bold;" class="text-black">{{ $book->Title }}</p>
                            <p style="font-size: 1rem;" class="text-black">Author: {{ $book->Author }}</p>
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