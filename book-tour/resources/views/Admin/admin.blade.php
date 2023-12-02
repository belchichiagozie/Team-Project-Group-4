<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
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
        <header>
            <h2>
                <label for="">
                    <span class="las la-bars"></span>
                </label>

                Dashboard
            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search Here" />
            </div>

            <div class="user-wrapper">
                <img src="img.jpg" width="40px" height="40px" alt="">
                <div>
                    <h4>Zahid Faqiri</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

        <main>

            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>54</h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

            
                <div class="card-single">
                    <div>
                        <h1>124</h1>
                        <span>Orders</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
            

            
                <div class="card-single">
                    <div>
                        <h1>£100,000</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
            

            </div>
                
                <div class="recent-grid">
                    <div class="projects">
                        <div class="card">
                            <div class="card-header">
                                <h2>New Books</h2>
                                <button>See All</button>
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
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="recent-grid">
                    <div class="customers">
                        <div class="card">
                            <div class="card-header">
                                <h2>New Customers</h2>
                                <button>See All</button>
                            </div>
                            <div class="card-body">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Customer ID</td>
                                            <td>First Name</td>
                                            <td>Last Name</td>
                                            <td>Email</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{$customer->Customer_ID}}</td>
                                                <td>{{$customer->First_Name}}</td>
                                                <td>{{$customer->Surname}}</td>
                                                <td>{{$customer->Email}}</td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

        </main>
    </div>
</body>
</html>