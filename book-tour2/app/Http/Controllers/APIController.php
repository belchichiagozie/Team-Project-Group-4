<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class APIController extends Controller
{
    public function getBooks(){
        $books = Book::get();
        return response()->json(['books'=>$books],200);
    }
    //
}
