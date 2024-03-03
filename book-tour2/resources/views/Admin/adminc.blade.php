@extends('layouts.admin')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Customers</title>
    <!-- font link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- css file -->
    <link rel="stylesheet" type="text/css" href="/css/admin.css"/>
</head>
<body>
    @section('content')
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
                Customers
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

            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Customers</span>
                    </div>

                </div>

            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Orders</span>
                    </div>

                </div>

            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>£100,000</h1>
                        <span>Income</span>
                    </div>

                </div>

            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Customers</span>
                    </div>

                </div>
                
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Customers</span>
                    </div>

                </div>

        </main>
    </div>
</div>
@endsection
</body>
</html>