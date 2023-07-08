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
//        $this->middleware('auth');
    }

    public function index()
    {
        auth()->loginUsingId(1);
//        return view('home');
    }

    public function inbox()
    {
        $tasks = auth()->user()->tasks->where('is_archive', 0)->where('parent_id', 0)->where('is_done', 0)->sortBy('order');
        return view('inbox', compact('tasks'));
    }
}
