<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Registered;
use App\Models\Book;
use App\Models\User;

class RegisteredListener
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


    public function handle(Registered $event)
    {
        // Retrieve the registered user
        $user = $event->user;

        // Retrieve the session basket contents
        $sessionBasket = session('basket', []);

        // Add session basket items to the user's basket
        foreach ($sessionBasket as $bookId => $quantity) {
            // Retrieve the book from the database
            $book = Book::find($bookId);

            // Attach the book to the user's basket with the given quantity
            $user->books()->attach($bookId, ['Quantity' => $quantity]);
        }

        // Clear the session basket
        session()->forget('basket');
    }
}

