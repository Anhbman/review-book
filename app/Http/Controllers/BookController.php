<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books.book',compact('books'));
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request) {
        $data = $request->validate(
            [
                'title' => 'required|max:255|unique:books',
                'author' => 'required',
                'description' => 'required',
                'image' => 'required',
            ]
        );
        $book = new Book();
        $book->title = $data['title'];
        $book->description = $data['description'];
        $book->author = $data['author'];
        $path = $this->_upload($request);
        if ($path) {
            $book->image = $path;
        }
        $book->save();
        return redirect()->route('book.create')->with('status','create success!');
    }
    

    public function _upload($request) {
        if ($request->file()) {
            try {
                $name = $request->file('image')->getClientOriginalName();
                $pathFull = 'uploads/' . date("Y/m/d");
                $request->file('image')->storeAs(
                    'public/' . $pathFull,
                    $name
                );
                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }

        }
        return false;
    }
}
