<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;

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
    
        // Check if a new image was uploaded
        if($request->hasFile('image')){
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
    
            // Delete old image file if needed, then update path
            // Storage::delete('/path/to/old/image.jpg');
    
            $book->file = $newImageName;
        }
    
        // Update other book details
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

    // Optional: Delete associated image file
    $imagePath = public_path('images/' . $book->file);
    if (file_exists($imagePath)) {
        @unlink($imagePath);
    }

    // Delete the book from the database
    $book->delete();

    return response()->json([
        'status' => 200,
        'message' => 'Book Deleted Successfully!'
    ], 200);
}
}
