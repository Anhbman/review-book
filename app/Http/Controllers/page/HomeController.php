<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index() {
        $books = Book::orderBy('id', 'DESC')->get();
        $bookViews = Book::orderBy('view','DESC')->limit(5)->get();
        $points = Point::orderBy('id','DESC')->limit(5)->get();
        return view('pages.home',compact(['books','bookViews','points']));
    }

    public function viewBook($id) {
        $book = Book::where('id',$id)->first();
        $comments = Comment::where('book_id',$id)->get();
        $book->view = $book->view + 1;
        $book->save();

        return view('pages.book',compact(['book','comments']));
    }

    public function comment(Request $request) {
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->book_id = $request->book_id;
        $comment->content = $request->comment;
        if ($comment->content == null)
        {
            return redirect()->back();
        }
        $comment->save();
        return redirect()->back();
    }

    public function point(Request $request) {
        $point = new Point();
        $point->user_id = Auth::user()->id;
        $point->book_id = $request->book_id;
        $point->point = $request->point;
        $point->save();
        return redirect()->back();
    }
}
