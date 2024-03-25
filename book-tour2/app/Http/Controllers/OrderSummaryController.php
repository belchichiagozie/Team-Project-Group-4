<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class OrderSummaryController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $orders = Order::where('user_id', $userId)->with(['items.book' => function ($query) {
            $query->withTrashed();
        }])->get();

        if ($orders->isEmpty()) {
            return redirect()->back()->with('error', 'No order found!!!!');
        }

        return view('Basket.ordersview', ['orders' => $orders]);
    }
}

