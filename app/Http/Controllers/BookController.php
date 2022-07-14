<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function getListBooks() 
    {
        $books = Book::all();

        return response->json()
    }
}
