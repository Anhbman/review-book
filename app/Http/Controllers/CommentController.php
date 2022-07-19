<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::paginate(8);;
        return view('comments.index',compact('comments'));
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with('status','xóa thành công!');
    }
}
