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
        $books = Book::orderBy('id', 'DESC')->paginate(8);
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
        $checkpoint = null;
        if(Auth::user()) {
            $checkpoint = Point::where('book_id',$id)->where('user_id',Auth::user()->id)->first();
        }
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

        return view('pages.book',compact(['book','comments','pointAvg','checkpoint']));
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
        $data = $request->validate(
            [
            'point' => 'required|integer|between:1,10',
            ],
            [
                'point.required' => 'bạn chưa chấm điểm',
                'point.integer' => 'nhập số',
                'point.between' => 'điểm chấm là phải từ 1 đến 10'
            ]
        );
        $point = new Point();
        $point->user_id = Auth::user()->id;
        $point->book_id = $request->book_id;
        $point->point = $data['point'];
        $point->save();
        return redirect()->back()->with('status','cho điểm thành công!');;
    }
}
