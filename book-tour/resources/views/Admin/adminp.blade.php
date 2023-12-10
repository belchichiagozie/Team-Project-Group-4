@extends('layouts.admin')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Products</title>
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" type="text/css" href="/css/admin.css"/>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="/admin/dashboard"><span class="dashboard"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="/admin/products"><span class="products"></span>
                    <span>Products</span></a>  
                </li>
                <li>
                    <a href="/admin/customers"><span class="customers"></span>
                    <span>Customers</span></a> 
                </li>
                <li>
                    <a href="/admin/orders"><span class="orders"></span>
                    <span>Orders</span></a> 
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div id="app">
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="fullwidth">
            <div class="container">
            <h2>
                Products
            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search Here" />
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="user-wrapper">
                <img src="img.jpg" width="40px" height="40px" alt="">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
        </nav>
        </header>

        <main>
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h2>New Books</h2>
                        </div>

                        <div class="card-body">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <td>Book Title</td>
                                        <td>Author</td>
                                        <td>Genre</td>
                                        <td>Price</td>
                                        <td>Stock</td>
                                        <td>Image</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                    <tr>
                                        <td>{{$book->Title}}</td>
                                        <td>{{$book->Author}}</td>
                                        <td>{{$book->Genre}}</td>
                                        <td>{{$book->Price}}</td>
                                        <td>{{$book->Stock}}</td>
                                        <td><img src="/images/{{$book->file}}" width="60px" height="80px" alt="{{$book->Book_ID}}"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            <div class="cards">
                <a href="adminaddproducts" class="add-product-btn">Add New</a>
            </div>

        </main>
    </div>
</div>
</body>
</html>