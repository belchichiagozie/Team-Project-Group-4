<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use App\Models\Book;
use App\Models\User;

class LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event)
    {
        $user = $event->user;

        $sessionBasket = session('basket', []);

        foreach ($sessionBasket as $bookId => $quantity) {
            $existingItem = $user->books()->wherePivot('Book_ID', $bookId)->first();

            if ($existingItem) {
                $user->books()->updateExistingPivot($bookId, ['Quantity' => $existingItem->pivot->Quantity + $quantity]);
            } else {
                $user->books()->attach($bookId, ['Quantity' => $quantity]);
            }
        }

        session()->forget('basket');
    }
}
