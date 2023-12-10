<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $user = Auth::user();
        if (Auth::check()) {
            return view('/productsauth', ['books' => $books, 'user' => $user]);
        } else {
            return view('/products', ['books' => $books]);
        }
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('showproducts', ['book' => $book]);
    }
}
