<?php

namespace App\Http\Controllers;

use App\Models\Craft;
use App\Models\MasterClass;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function about()
    {
        return view('home.about');
    }
}