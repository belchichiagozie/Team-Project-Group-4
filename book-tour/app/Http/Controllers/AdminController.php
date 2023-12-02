<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        $books = Book::all();
        return view('Admin/admin', ['customers' => $customers, 'books' => $books]);
    }
    //
}
