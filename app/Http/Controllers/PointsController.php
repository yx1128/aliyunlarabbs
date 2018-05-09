<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Point;

class PointsController extends Controller
{
  public function index()
     {
       $points = Point::all();
       return view('points.index', compact('points'));
     }
}
