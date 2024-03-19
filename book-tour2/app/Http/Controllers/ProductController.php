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
        return view('/products', ['books' => $books, 'user' => $user]);
    }

    public function show($id)
    {
        $book = Book::find($id);
        $reviews = Review::where('Book_ID', $id)->get();
        $user = Auth::user();
        return view('showproducts', ['book' => $book, 'reviews' => $reviews, 'user' => $user]);
    }
    //
}
