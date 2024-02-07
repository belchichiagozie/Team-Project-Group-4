<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

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
        return view('showproducts', ['book' => $book]);
    }
    //
}
