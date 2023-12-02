<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;


class AdminProductController extends Controller
{
    public function index()
    {
        return view('Admin/adminp');
    }

    public function store()
    {
        $book = new Book();
        $book->Title = request('title');
        $book->Author = request('author');
        $book->Genre = request('genre');
        $book->Price = request('price');
        $book->Stock = request('stock');

        $book->save();

        return redirect('/admin/products');
    }
    //
}
