@extends('layouts.loginnav')

@section('content')
<div class="border border-solid rounded-2xl">
    <div class="w-max">
        <h1 class="text-2xl text-black font-bold text-center py-4">Your Order History</h1>

        @foreach ($orders as $order)
            <h2 class="text-xl text-black font-semibold my-4">Order ID: {{ $order->Order_ID }} - Date: {{ $order->Created_At }}</h2>
            <table class="w-full mb-8">
                <thead class="text-white bg-cyan-950 text-blue-900 font-bold">
                    <tr>
                        <td>Title</td>
                        <td>Cover</td>
                        <td>Quantity</td>
                        <td>Price per Book</td>
                        <td>Total Price</td>
                        <td>Order Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                    <tr>
                        <td class="text-black">{{ $item->book?->Title }}</td>
                        <td class="text-black w-20 h-24"><img src="/images/{{ $item->book?->file }}" alt="{{ $item->book?->Title }}" class="w-full h-full object-cover"/></td>
                        <td class="text-black">{{ $item->Quantity }}</td>
                        <td class="text-black">£{{ number_format($item->book?->Price, 2) }}</td>
                        <td class="text-black">£{{ number_format($item->Quantity * $item->book?->Price, 2) }}</td>
                        <td class="text-black">{{ $order->status }}</td>
                    </tr>
                    @endforeach
                    <tr class="font-bold">
                        <td colspan="4" class="text-right">Order Total:</td>
                        <td class="text-black">£{{ number_format($order->Order_Total, 2) }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        @endforeach

    </div>
</div>
@endsection
