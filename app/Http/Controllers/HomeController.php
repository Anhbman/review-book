<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->paginate(8);
        $bookViews = Book::orderBy('view','DESC')->limit(5)->get();
        $points = Point::orderBy('id','DESC')->limit(5)->get();
        return view('home',compact(['books','bookViews','points']));
    }
}
