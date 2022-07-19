<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index() {
        $points = Point::orderBy('id', 'DESC')->paginate(8);

        return view('points.index',compact('points'));
    }
}
