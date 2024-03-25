<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Book;
use App\Models\User;

class OrderController extends Controller
{


    public function checkout(Request $request)
    {

        $userId = null;
        $shippingFirstName = $request->Shipping_First_Name;
        $shippingLastName = $request->Shipping_Last_Name;
        $shippingAddress = $request->Shipping_Address;
        $shippingCity = $request->Shipping_City;
        $orderTotal = 5;

        // Retrieve user information if authenticated
        if (auth()->check()) {
            $userId = auth()->user()->id;
        }

        // Retrieve basket contents
        if (auth()->check()) {
            $user = User::find($userId);
            $basketItems = $user->books()->select('books.*', 'basket.Quantity')->get();
        } else {
            return Redirect::route('showRegistrationForm')->with('message', 'You need to register to checkout.');
        }

        // Calculate order total
        foreach ($basketItems as $item) {
            $orderTotal += $item->Price * $item->pivot->Quantity;
        }

        // Create order
        $order = new Order();
        $order->User_ID = $userId;
        $order->Shipping_First_Name = $shippingFirstName;
        $order->Shipping_Last_Name = $shippingLastName;
        $order->Shipping_Address = $shippingAddress;
        $order->Shipping_City = $shippingCity;
        $order->Order_Total = $orderTotal;
        //dd($order);
        $order->save();

        // Create order items
        foreach ($basketItems as $item) {
            $orderItem = new OrderItem();
            $orderItem->Order_ID = $order->Order_ID;
            $orderItem->Book_ID = $item->Book_ID;
            $orderItem->Quantity = $item->pivot->Quantity;
            $orderItem->save();

            // Update book stock
            $book = Book::find($item->Book_ID);
            $book->Stock -= $item->pivot->Quantity;
            $book->save();
        }

        // Clear user's basket
        if (auth()->check()) {
            $user->books()->detach();
        } else {
            session()->forget('basket');
        }

        return view('Basket.checkout', ['order' => $order, 'basketItems' => $basketItems]);
    }

    }
