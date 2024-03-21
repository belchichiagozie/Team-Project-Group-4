<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;


class ReviewController extends Controller
{

    public function add($id) {
        $book = Book::find($id);
        return view("reviews", ['book' => $book]);
    } 

    private function createReviewUser(Request $request) {
        $review = new Review;
        $review->Book_ID = $request->input('book_id');
        $review->User_ID = Auth::user()->id;
        $review->Customer_Name = Auth::user()->name;
        $review->Title = $request->input('review_title');
        $review->Body = $request->input('review_body');

    
        $review->save();
    }
    

    public function create(Request $request) {
        
    $bookID = $request->input('book_id');
    $user = Auth::user();

    if ($user) {
        $this->createReviewUser($request);
    } else {
        return redirect()->route('login');
    }

    return redirect()->route('products.show',['id'=>$bookID]);
    }

    public function delete(Request $request) {
        $user_id = Auth::user()->id;
        $bookID = $request->input('book_id');

        error_log("User ID: " . $user_id);
        error_log("Book ID: " . $bookID);

        $review = Review::where('User_ID', $user_id)->where('Book_ID', $bookID);

        if ($review != null) {
            $review->delete();
            error_log("Review Deleted");
        }

        return redirect()->route('products.show',['id'=>$bookID]);
    }
    public function hasReview($bookID) {
        $user_id = Auth::user()->id;

        if (Auth::user() == null) {
            return false;
        }


        $review = Review::where('User_ID', $user_id)->where('Book_ID', $bookID)->first();
        if ($review != null) {
            return true;
        } else {
            return false;
        }
    }
}