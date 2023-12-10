<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        
        $books = Book::query();

       
        if ($request->has('sort')) {
            $sortField = $request->input('sort');
            $books->orderBy($sortField);
        }

        if ($request->has('sort') && $request->input('sort') === 'title') 
        {
            $title_Filtersort = $request->input('searchInput');
            if ($title_Filtersort) 
            {
                $books->where('Title', 'like', '%' . $title_Filtersort . '%');
            }

        } 
        elseif ($request->has('sort') && $request->input('sort') === 'genre') 
        {
            $genre_Filtersort = $request->input('searchInput');
            if ($genre_Filtersort) 
            {
                $books->where('Genre', 'like', '%' . $genre_Filtersort . '%');
            }
        }
        elseif ($request->has('sort') && $request->input('sort') === 'author') 
        {
            $author_Filtersort = $request->input('searchInput');
            if ($author_Filtersort) 
            {
                $books->where('Author', 'like', '%' . $author_Filtersort . '%');
            }
        } 
      

        $books = $books->get();
        return view('catalog', ['books' => $books]);
    }
}
