<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ReadingListController extends Controller
{
    public function index() {
        $userId = auth()->user()->id;
        $books = User::find($userId)->readingList;
        return view('readinglist',['books' => $books]);
    }

    public function addToReadingList(Request $request)
{

    if (Auth::user() == null) {
        return redirect()->route('login');
    }

    $userId = auth()->user()->id; // Get authenticated user ID
    $bookId = $request->Book_ID; // 

    // Add to reading list if not already added
    $user = User::find($userId);
    if (!$user->readingList()->find($bookId)) {
        $user->readingList()->attach($bookId);
        return redirect()->back()->with('success', 'Book added to reading list successfully!');
    }
    

    return redirect()->back()->with('info', 'Book is already in your reading list.');

}

public function removeFromReadingList(Request $request)
{
    $userId = auth()->user()->id;
    $bookId = $request->Book_ID;

    // Remove from reading list
    $user = User::find($userId);
    $user->readingList()->detach($bookId);

    return redirect()->back()->with('success', 'Book removed from reading list successfully.');
}
    //
}
