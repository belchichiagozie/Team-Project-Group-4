@extends('layouts.navbar')

@section('content')
<section class="shopping-basket">
<body>
    <div class="wrapper">
        <h1>Shopping Basket</h1>
        <div class="basket">
            <div class="shop">
                <div class="box">
                    <img src="/images/bookcover6.png" alt="">
                    <div class="content">
                        <h3>Artifical Forces</h3>
                        <h4>Price: £10</h4>
                        <p class="unit">Quantity: <input value="1"></p>
                        <p class="btn-area">
                            <i class="fa fa-trash"></i>
                            <span class="btn2">Remove</span>
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="/images/bookcover17.png" alt="">
                    <div class="content">
                        <h3>Conquest Of Flames</h3>
                        <h4>Price: £10</h4>
                        <p class="unit">Quantity: <input value="1"></p>
                        <p class="btn-area">
                            <i class="fa fa-trash"></i>
                            <span class="btn2">Remove</span>
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="/images/bookcover3.png" alt="">
                    <div class="content">
                        <h3>Hide and Seek</h3>
                        <h4>Price: £10</h4>
                        <p class="unit">Quantity: <input value="1"></p>
                        <p class="btn-area">
                            <i class="fa fa-trash"></i>
                            <span class="btn2">Remove</span>
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="/images/bookcover16.png" alt="">
                    <div class="content">
                        <h3>a Lady in the Countryside</h3>
                        <h4>Price: £10</h4>
                        <p class="unit">Quantity: <input value="1"></p>
                        <p class="btn-area">
                            <i class="fa fa-trash"></i>
                            <span class="btn2">Remove</span>
                        </p>
                    </div>
                </div>
            </div>
               
            <div class="right-bar">
                <p><span>Subtotal</span> <span>£40</span></p>
                <hr>
                <p><span>Discount (50%) </span> <span>£20</span></p>
                <hr>
                <p><span>Shipping</span> <span>£5</span></p>
                <hr>
                <p><span>Total</span> <span>£25</span></p>

                <a href="#"><i class="fa fa-shopping-cart"></i> Checkout </a>
            </div>
        </div>
    </div>
</body>

    <!--<h1>Your Basket</h1>
    


    @if (count($basketItems) > 0)
        <table>
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($basketItems as $item)
                    <tr>
                        <td>{{ $item->book ? $item->book->Title : $item->Title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>£{{ $item->book ? $item->book->Price : $item->Price }}</td>
                        <td>£{{ $item->quantity * ($item->book ? $item->book->Price : $item->Price) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p>Total: £{{ $total }}</p>
    @else
        <p>Your basket is empty.</p>
    @endif

    <h2>Add Books to Basket</h2>


    <form action="{{ route('basket.add') }}" method="post">
        @csrf
        <label for="book_id">Select Books to Add:</label>
        <select name="book_id" id="book_id">
            @foreach ($availableBooks as $book)
                <option value="{{ $book->Book_ID }}">{{ $book->Title }} - £{{ $book->Price }}</option>
            @endforeach
        </select>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1">
        <button type="submit">Add to Basket</button>
    </form>

    <h2>Remove Books from Basket</h2>

    <form action="{{ route('basket.remove') }}" method="post">
        @csrf
        <label for="book_ids">Select Books to Remove:</label>
        <select name="book_id" id="book_id">
            @foreach ($basketItems as $item)
                <option value="{{ $item->Book_ID }}">{{ $item->Title }} - ${{ $item->Price }}</option>
            @endforeach
        </select>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1">

        <button type="submit">Remove from Basket</button>
    </form>-->


@endsection