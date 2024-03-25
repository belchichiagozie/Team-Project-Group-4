@extends('layouts.loginnav')

@section('content')
<div class="border border-solid rounded-2xl">
    <div class="w-max">
        <h1 class="text-2xl text-black font-bold text-center py-4">Your Order History</h1>
        <table class="w-full">
            <thead class="text-white bg-cyan-950 text-blue-900 font-bold">
                <tr>
                    <td>Title</td>
                    <td>Image</td>
                    <td>Order ID</td>
                    <td>Quantity</td>
                    <td>Price per Book</td>
                    <td>Total Price</td>
                    <td>Order Status</td>
                    <td>Order Date</td>
                </tr>
            </thead>
            <tbody>
                @foreach(array_reverse($orderItems) as $orderItem)
                <tr>
                    <!-- Your order item details here -->
                    <td class="text-black">{{ $orderItem->book->Title }}</td>
                    <td class="text-black w-20 h-24"><img src="images/{{ $orderItem->book->file }}" alt=""/></td>
                    <td class="text-black">{{ $orderItem->Order_ID }}</td>
                    <td class="text-black">{{ $orderItem->Quantity }}</td>                   
                    <td class="text-black">£{{ number_format($orderItem->book->Price, 2) }}</td>
                    <td class="text-black">£{{ number_format($orderItem->Quantity * $orderItem->book->Price, 2) + 5 }}</td>
                    <td class="text-black">{{$orderItem->status}}</td>
                    <td class="text-black">{{ $orderItem->created_at }}</td>
                    <!-- Add other details as needed -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
