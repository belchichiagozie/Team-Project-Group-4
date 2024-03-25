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

        $orders = Order::where('user_id', $userId)->with(['items.book' => function ($query) {
            $query->withTrashed();
        }])->get();

        if ($orders->isEmpty()) {
            return redirect()->back()->with('error', 'No order found!!!!');
        }

        $orderItems = [];
        $bookIds = [];

        foreach ($orders as $order) {
            foreach ($order->items as $item) {
                if ($item->book !== null) {
                    $item->status = $order->status;
                    $orderItems[] = $item;
                    $bookIds[] = $item->book->Book_ID;
                }
            }
        }


        $books = Book::withTrashed()->whereIn('Book_ID', $bookIds)->get();

        return view('Basket.ordersview', ['orderItems' => $orderItems, 'books' => $books]);
    }
}

