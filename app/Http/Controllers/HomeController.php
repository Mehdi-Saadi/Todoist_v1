<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
//        auth()->loginUsingId(1);
        return 'logged in!';
    }

    public function inbox()
    {
        return view('inbox');
    }

    public function taskDetails(Request $request)
    {
        return $request;
    }

    public function filter_label()
    {
        $labels = auth()->user()->labels->sortBy('order');
        return view('labels', compact('labels'));
    }
}
