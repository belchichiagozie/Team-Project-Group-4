<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ProductController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $user = Auth::user();
        //dd($books);
        return view('/products', ['books' => $books, 'user' => $user]);
    }

    public function show($id)
    {   
        $book = Book::find($id);
        $reviews = Review::where('Book_ID', $id)->get();
        $user = Auth::user();
        $canReview = !($this->hasReview($id));
        return view('showproducts', ['book' => $book, 'reviews' => $reviews, 'user' => $user], compact('canReview'));
    }

    public function hasReview($bookID) {

        $user = Auth::user();
    
        if ($user == null) {
            return true;
        }


        $review = Review::where('User_ID', $user->id)->where('Book_ID', $bookID);
        error_log("Review: " . $review->get());
        if ($review->get()->count() > 0){
            return true;
        } else {
            return false;
        }
    }
}
