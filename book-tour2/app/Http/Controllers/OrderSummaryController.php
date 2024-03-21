<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Book;

class OrderSummaryController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $orders = Order::where('user_id', $userId)->get();
        if (!$orders) 
        {
            return redirect()->back()->with('error', 'No order found!!!!');
        }

        $orderItems = [];

        foreach ($orders as $order) 
        {
            $orderItem = OrderItem::where('Order_ID', $order->Order_ID)->get();
            $orderItems = $orderItem;
        }

        $books = [];

        foreach ($orderItems as $orderItem) 
        {
    
            $book = Book::find($orderItem->Book_ID);
      
            if ($book) 
            {
                $books[] = $book;
            }

        }
        return view('Basket.ordersview', ['orderItems' => $orderItems, 'books' => $books]);
    }
        
}
