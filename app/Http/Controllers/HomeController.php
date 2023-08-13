<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['app']);
        $this->middleware(['guest'])->only(['index']);
    }

    public function index()
    {
        return view('index');
    }

    public function app()
    {
        // get the first user's archive (inbox)
        $archive_id = auth()->user()->archives()->pluck('id')->first();
        return view('app', compact('archive_id'));
    }

//    public function taskDetails(Request $request)
//    {
//        return $request;
//    }

//    public function filter_label()
//    {
//        $labels = auth()->user()->labels->sortBy('order');
//        return view('labels', compact('labels'));
//    }
}
