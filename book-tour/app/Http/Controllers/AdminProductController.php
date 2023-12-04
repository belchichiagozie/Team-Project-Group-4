<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;


class AdminProductController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('Admin/adminp', ['books' => $books]);
    }

    public function add_index()
    {
        return view('Admin/adminaddproducts');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'price' => 'required|integer|min:0|max:1000',
            'stock' => 'required|integer|min:1|max:1000',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $book = new Book();
        $book->Title = request('title');
        $book->Author = request('author');
        $book->Genre = request('genre');
        $book->Price = request('price');
        $book->Stock = request('stock');
        $book->file = $newImageName;


        $book->save();

        return redirect('/admin/adminaddproducts');
    }
    //
}
