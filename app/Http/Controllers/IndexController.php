<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use View;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('index', array(
            'categories' => Categories::all(),
            'isLoggedIn' => Auth::check(), 
        ));
    }
}
