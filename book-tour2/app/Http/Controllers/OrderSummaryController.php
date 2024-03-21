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
        $order = Order::where('user_id', $userId)->first();
        if (!$order) 
        {
            return redirect()->back()->with('error', 'No order found!!!!');
        }

        $orderItems = OrderItem::where('Order_ID', $order->Order_ID)->get();
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
