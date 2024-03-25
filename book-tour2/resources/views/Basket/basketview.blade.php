@extends('layouts.navbar')

@section('content')
<section class="shopping-basket">
<body>
    <div class="wrapper">
        <h1>Shopping Basket</h1>
        <div class="basket">
            <div class="shop">
            @if($basket->isEmpty())
            <div style="text-align: center;">
                        <h2>Your basket is empty</h2>
                    </div>
                @else
                    @foreach($basket as $item)
                        <div class="box">
                            <img src="/images/{{$item->file}}" alt="Book Image">
                            <div class="content">
                                <h3>{{$item->Title}}</h3>
                                <h4>Price: £{{$item->Price}}</h4>
                                <p class="unit">Quantity:
                                    @if(auth()->check())
                                        {{$item->pivot->Quantity}}
                                    @else
                                        {{$item->Quantity}}
                                    @endif
                                </p>
                                <form action="{{ route('basket.remove') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="Book_ID" value="{{ $item->Book_ID }}">
                                    <button type="submit" class="fa fa-trash"></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
               
            <div class="right-bar">
                <p><span>Subtotal</span> <span>£{{$totalPrice}}</span></p>
                <hr>
                @if(!$basket->isEmpty())
                    <p><span>Shipping</span> <span>£5</span></p>
                    <hr>
                    <p><span>Total</span> <span>£{{$totalPrice + 5}}</span></p>
                    <a href="{{ route('basket.checkout') }}"><i class="fa fa-shopping-cart"></i> Checkout </a>
                @else
                    <p><span>Shipping</span> <span>£0</span></p>
                    <hr>
                    <p><span>Total</span> <span>£{{$totalPrice}}</span></p>
                @endif

            </div>
        </div>
    </div>
</body>

    
@endsection