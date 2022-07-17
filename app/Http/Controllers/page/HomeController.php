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

    public function search(Request $request) {
        $keyword = $request->keyword;
        $books = Book::where('title','LIKE','%'.$keyword.'%')->orWhere('author','LIKE','%'.$keyword.'%')->get();
        return view('pages.search',compact(['books']));
    }

    public function viewBook($id) {
        $book = Book::where('id',$id)->first();
        $comments = Comment::where('book_id',$id)->get();
        $book->view = $book->view + 1;
        $points = Point::where('book_id',$id)->get();
        $sum = 0;
        foreach ($points as $point) {
            $sum += $point->point;
        }
        $book->save();
        if (count($points) != 0) {
            $pointAvg = round($sum/count($points),1);
        } else {
            $pointAvg = 0;
        }

        return view('pages.book',compact(['book','comments','pointAvg']));
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
