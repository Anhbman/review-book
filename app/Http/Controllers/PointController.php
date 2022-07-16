<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index() {
        $points = Point::all();

        return view('points.index',compact('points'));
    }
}
