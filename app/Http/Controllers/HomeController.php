<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $unit = Unit::all();
        return view('home', compact('unit'));
    }
}
