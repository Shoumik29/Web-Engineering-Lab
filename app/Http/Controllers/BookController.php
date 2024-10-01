<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{

    public function index(Request $request)
    {
        if($request->has("search"))
        {
            $allbooks = Book::Where("title", "like", "%".$request->search."%")->orWhere("author", "like", "%".$request->search."%")->paginate(10);
        }
        else
        {
            $allbooks = Book::paginate(10);
        }
        return view('Books.index')->with('books', $allbooks);
    }

    public function show($id)
    {
        $book = Book::find($id);
        return view('Books.show')->with('book', $book);
    }

    public function create()
    {
        return view('Books.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|size:13',
            'stock' => 'required|numeric|integer|gte:0',
            'price' => 'required|numeric'
        ];

        $message = [
            'stock.gte' => "Stock must be greater than or equal to 0"
        ];

        $request->validate($rules, $message);

        Book::create($request->all());

        return redirect()->route('Book.index');
    }

    public function destroy(Request $request, $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('Book.index');
    }
}

