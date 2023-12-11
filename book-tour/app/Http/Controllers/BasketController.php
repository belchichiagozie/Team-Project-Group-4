<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;
use App\Models\Book;
use Illuminate\Http\Request;


class BasketController extends Controller
{

    public function viewBasket()
    {
        $user = Auth::user();
        if ($user) {
            $basketItems = Basket::where('customer_id', $user->Customer_ID)->with('book')->get();
        } else {
            $basket = session()->get('basket', []);
            $bookIds = array_keys($basket);
            $basketItems = Book::whereIn('Book_ID', $bookIds)->get();
            foreach ($basketItems as $item) {
                $item->quantity = $basket[$item->Book_ID];
            }
        }

        $availableBooks = Book::all();
        $total = $this->calculateTotal($basketItems);
        return view('basket.basketview', compact('basketItems', 'total', 'availableBooks'));
    }

    public function addToBasket(Request $request)
    {
        //dd($request->all());
        $bookId = $request->input('book_id');
        $quantity = $request->input('quantity', 1);
        $user = Auth::user();

        if ($user) {
            $this->addToBasketUser($user->id, $bookId, $quantity);
        } else {
            $this->addToBasketGuest($bookId, $quantity);
        }

        return redirect()->route('basket.view');
    }

    private function addToBasketUser($userId, $bookId, $quantity)
    {
        $basketItem = Basket::where('customer_id', $userId)
            ->where('book_id', $bookId)
            ->first();
        if ($basketItem) {
            $basketItem->quantity += $quantity;
            $basketItem->save();
        } else {
            Basket::create([
                'customer_id' => $userId,
                'book_id' => $bookId,
                'quantity' => $quantity,
            ]);
        }
    }

    private function addToBasketGuest($bookId, $quantity)
    {
        $basket = session()->get('basket', []);

        if (isset($basket[$bookId])) {
            $basket[$bookId] += $quantity;
        } else {
            $basket[$bookId] = $quantity;
        }

        session(['basket' => $basket]);
    }

    public function removeFromBasket(Request $request)
    {
        $bookId = $request->input('book_id');
        $quantity = $request->input('quantity', 1);
        $user = auth()->user();

        if ($user) {
            $this->removeFromBasketUser($user->Customer_ID, $bookId, $quantity);
        } else {
            $this->removeFromBasketGuest($bookId, $quantity);
        }

        return redirect()->route('basket.view');
    }

    private function removeFromBasketUser($userId, $bookIds, $quantity)
    {
        Basket::where('customer_id', $userId)
            ->whereIn('book_id', $bookIds)
            ->where('quantity', '>=', $quantity)
            ->decrement('quantity', $quantity);
    }

    private function removeFromBasketGuest($bookId, $quantity)
    {
        $basket = session()->get('basket', []);

        if (isset($basket[$bookId]) && $basket[$bookId] >= $quantity) {
            $basket[$bookId] -= $quantity;
            if ($basket[$bookId] === 0) {
                unset($basket[$bookId]);
            }
        }

        session(['basket' => $basket]);
    }

    public function calculateTotal($basketItems): float
    {
        $total = 0;

        foreach ($basketItems as $item) {
            if ($item->book) {
                $total += $item->book->Price * $item->quantity;
            } else {
                $total += $item->Price * $item->quantity;
            }
        }

        $total = number_format($total, 2, '.', '');
        return (float) $total;
    }

}
