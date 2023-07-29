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
        $user = auth()->user();
        $tasks = $user->tasks->where('is_archive', 0)->where('parent_id', 0)->sortBy('order');
        $labels = $user->labels;

        return view('inbox', compact(['tasks', 'labels']));
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
