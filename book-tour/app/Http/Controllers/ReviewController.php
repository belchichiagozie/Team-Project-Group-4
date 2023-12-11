<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //
    public function add($id) {
        $book = Book::find($id);
        return view("reviews", ['book' => $book]);
    }

    public function create(Request $request) {
        
    $bookID = $request->input('book_id');
    $user = Auth::user();
    $review = $request->input('review');

    #$this->createReviewUser($user->id, $bookID);
    $this->createReviewUser($user->Customer_ID, $bookID, $review);

    return redirect()->route('products.index');
    }

    private function createReviewUser($userID, $bookID, $review) {
                $new_review = Review::create([
                    'Customer_ID' => $userID,
                    'Book_ID' => $bookID,
                    'Title' => 'Review',
                    'Body' => $review]);

                    if ($new_review) {
                        error_log('Review created successfully');
                    } else {
                        error_log('Review creation failed');
                    }
    }






}
