<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function index()
{
    $basket = [];

    if (auth()->check()) {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $totalPrice = $this->calculateTotalPriceForUser($user);
        $basket = $user->books()->select('books.*', 'basket.Quantity')->get();
    } else {
        
        $totalPrice = $this->calculateTotalPriceForSessionBasket();
        $basket = session()->get('basket', []);
        $bookIds = array_keys($basket);
        $basketItems = Book::whereIn('Book_ID', $bookIds)->get();
        foreach ($basketItems as $item) {
            $item->Quantity = $basket[$item->Book_ID];
        }
        $basket = $basketItems;
    }

    return view('Basket.basketview', ['basket' => $basket, 'totalPrice' => $totalPrice]);
}

    public function addToBasket(Request $request)
{
    if (auth()->check()) {
        $userId = auth()->user()->id;
        $bookId = $request->Book_ID;
        $quantity = $request->Quantity;

        $user = User::find($userId);

        $existingItem = $user->books()->wherePivot('Book_ID', $bookId)->first();
        if ($existingItem) {
            $user->books()->updateExistingPivot($bookId, ['Quantity' => $existingItem->pivot->Quantity + $quantity]);
        } else {
            $user->books()->attach($bookId, ['Quantity' => $quantity]);
        }

        return redirect()->back()->with('success', 'Book added to basket successfully!');
    } else {
        $basket = session()->get('basket', []);
        $bookId = $request->Book_ID;
        $quantity = $request->Quantity;

        if (array_key_exists($bookId, $basket)) {
            $basket[$bookId] += $quantity;
        } else {
            $basket[$bookId] = $quantity;
        }

        session()->put('basket', $basket);
        return redirect()->back()->with('success', 'Book added to session basket successfully!');
    }
}

    public function removeFromBasket(Request $request)
{
        $bookId = $request->Book_ID;
        $quantityToRemove = $request->Quantity ?? 1;

        if (auth()->check()) {
            $userId = auth()->user()->id;
            $user = User::find($userId);

            $existingItem = $user->books()->wherePivot('Book_ID', $bookId)->first();
            if ($existingItem) {
                $newQuantity = max(0, $existingItem->pivot->Quantity - $quantityToRemove);

                if ($newQuantity > 0) {
                    $user->books()->updateExistingPivot($bookId, ['Quantity' => $newQuantity]);
                } else {
                    $user->books()->detach($bookId);
                }

                return redirect()->back()->with('success', 'Book removed from basket successfully!');
            } else {
                return redirect()->back()->with('error', 'Book not found in basket!');
            }
        } else {
            $basket = session()->get('basket', []);

            if (array_key_exists($bookId, $basket)) {
                $newQuantity = max(0, $basket[$bookId] - $quantityToRemove);

                if ($newQuantity > 0) {
                    $basket[$bookId] = $newQuantity;
                } else {
                    unset($basket[$bookId]);
                }

                session()->put('basket', $basket);
                return redirect()->back()->with('success', 'Book removed from session basket successfully!');
            } else {
                return redirect()->back()->with('error', 'Book not found in session basket!');
            }
        }
}
    private function calculateTotalPriceForUser($user)
{
        $totalPrice = 0;

        foreach ($user->books as $book) {
            $totalPrice += $book->Price * $book->pivot->Quantity;
        }

        return $totalPrice;
}
    private function calculateTotalPriceForSessionBasket()
{
        $totalPrice = 0;
        $basket = session()->get('basket', []);

        foreach ($basket as $bookId => $quantity) {
            $book = Book::find($bookId);
            if ($book) {
                $totalPrice += $book->Price * $quantity;
            }
        }

        return $totalPrice;
        
}
    public function checkout()
    {
        $basket = [];

    if (auth()->check()) {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $totalPrice = $this->calculateTotalPriceForUser($user);
        $basket = $user->books()->select('books.*', 'basket.Quantity')->get();
    } else {
        
        $totalPrice = $this->calculateTotalPriceForSessionBasket();
        $basket = session()->get('basket', []);
        $bookIds = array_keys($basket);
        $basketItems = Book::whereIn('Book_ID', $bookIds)->get();
        foreach ($basketItems as $item) {
            $item->Quantity = $basket[$item->Book_ID];
        }
        $basket = $basketItems;
    }

    return view('Basket.checkout', ['basket' => $basket, 'totalPrice' => $totalPrice]);
    }

}