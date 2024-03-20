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
    //
    public function add($id) {
        $book = Book::find($id);
        return view("reviews", ['book' => $book]);
    }

    private function createReviewUser(Request $request) {

        error_log("Creating review for user " . Auth::user()->id . " for book " . $request->input('book_id'));


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
    $reviewBody = $request->input('review_body');
    $reviewTitle = $request->input('review_title');

    if ($user) {
        $this->createReviewUser($request);
    } else {
        error_log('User not found');
    }

    return redirect()->route('products.show',['id'=>$bookID]);
    }

    






}