<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use App\Models\Basket;
use App\Models\Readinglist;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;

class APIController extends Controller
{
    public function getBooks(){
        $books = Book::get();
        return response()->json(['books'=>$books],200);
    }

    public function getFavourites(){
        $favourites=Book::where('Favourite',1)->get();
        return response()->json(['favourites'=>$favourites],200);
    }

    public function getOrders(){
        $orders = Order::with(['items.book' => function ($query) {
            $query->withTrashed();
        }, 'customer'])->get()->map(function ($order) {
            $order->userName = $order->customer->name; 
            $order->items->each(function ($item) {
                $item->totalAmountSpent = $item->Quantity * $item->book->Price;
            });
            return $order;
        });
        return response()->json(['orders' => $orders], 200);
    }

    public function getTotalSales(){
        $orders = Order::with('items.book')->get();

        $totalSales = $orders->reduce(function ($carry, $order) {
            foreach ($order->items as $item) {
                $carry += $item->Quantity * $item->book->Price;
            }
            return $carry;
        }, 0);
    
        return response()->json(['totalSales' => $totalSales], 200);
    }

    public function getTotalUsers() {
        $totalUsers = User::count();
        return response()->json(['totalUsers' => $totalUsers], 200);
    }

    public function getUsers(){
        $users= User::select('id','name','email','created_at')->get();
        return response()->json(['users'=>$users],200);
    }

    public function getUsersGrowth() {
        $users = User::all(['created_at']);
    
        $usersGrowth = $users->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d');
        })->map(function($group, $date) {
            return ['date' => $date, 'count' => $group->count()];
        });
    
        return response()->json($usersGrowth->values(), 200);
    }



    public function store(Request $request){
        
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'price' => 'required|integer|min:0|max:1000',
            'stock' => 'required|integer|min:1|max:1000',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->messages()
            ],422);
        };
        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $book=Book::create([
        'Title' => $request->title,
        'Author' => $request->author,
        'Genre' => $request->genre,
        'Price' => $request->price,
        'Stock' => $request->stock,
        'file' => $newImageName,
        ]);

        return response()->json([
            'status'=> 200,
            'message'=> 'Book Added Successfully!'
        ]);

    }
    //
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'price' => 'required|integer|min:0|max:1000',
            'stock' => 'required|integer|min:1|max:1000',
            'image' => 'sometimes|mimes:jpg,png,jpeg'
        ]);
    
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->messages()
            ],422);
        };
    
        $book = Book::find($id);
    
        if(!$book) {
            return response()->json([
                'status' => 404,
                'message' => 'Book Not Found!'
            ], 404);
        }
    

        if($request->hasFile('image')){
            $oldImagePath = public_path('images/' . $book->file);
            if (file_exists($oldImagePath)) {
                @unlink($oldImagePath);
            }
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);

            $book->file = $newImageName;
        }

        $book->Title = $request->title;
        $book->Author = $request->author;
        $book->Genre = $request->genre;
        $book->Price = $request->price;
        $book->Stock = $request->stock;
    
        $book->save();
    
        return response()->json([
            'status' => 200,
            'message' => 'Book Updated Successfully!'
        ]);
    }

    public function destroy($id)
{
    $book = Book::find($id);

    if (!$book) {
        return response()->json([
            'status' => 404,
            'message' => 'Book Not Found!'
        ], 404);
    }

    $imagePath = public_path('images/' . $book->file);
    $orders = OrderItem::where('Book_ID',$id);
    if (!$orders) {
        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }
    }
    
    $book->users()->detach();
    $book->delete();

    return response()->json([
        'status' => 200,
        'message' => 'Book Deleted Successfully!'
    ], 200);
}
}
