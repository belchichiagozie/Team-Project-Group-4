@extends('layouts.loginnav')

@section('content')


<div class="border border-solid rounded-lg">
    <div class="w-max">
        <h1 class="text-2xl text-black font-bold text-center py-4">Your Orders</h1> 
        <table class="w-full">
            <thead class="text-white bg-cyan-950 text-blue-900 font-bold">
                <tr>
                    <td> </td>
                    <td class="text-white">Book Title</td>
                    <td class="text-white">Shipping Address</td>
                    <td class="text-white">Quantity</td>
                    <td class="text-white">OrderID</td>
                    <td class="text-white">Cost</td>
                    <td class="text-white">Date</td>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($orderItems as $index => $orderItem)
                <tr>
                <td class="text-black"><img class="w-20 h-20" src="images/{{$books[$index]->file}}" /></td>
                    <td class="text-black">{{$orderItem->Order_Item_ID}}</td>
                    <td class="text-black">{{$books[$index]->Title}}</td>
                    <td class="text-black">{{$orderItem->Order_ID}}</td>
                    <td class="text-black">{{$orderItem->Quantity}}</td>
                    <td class="text-black">£30</td>
                    <td class="text-black">22/01/2024</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
