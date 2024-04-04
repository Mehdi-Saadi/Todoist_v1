<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Color;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index']);
    }

    public function index()
    {
        return view('index');
    }

    public function app()
    {
        $user = auth()->user();
        $labels = $user->labels->sortBy('order');
        // get the first user's archive (inbox)
        $inbox = $user->archives()->first();
        return view('app', compact(['inbox', 'labels']));
    }

    public function archive(Archive $archive)
    {
        $user = auth()->user();
        $labels = $user->labels->sortBy('order');
        // get the first user's archive (inbox)
        $inbox = $user->archives()->first();
        return view('app', compact(['inbox', 'labels']));
    }

    public function labels()
    {
        $colors = Color::all();
        $labels = auth()->user()->labels->sortBy('order');
        return view('labels', compact(['labels', 'colors']));
    }
}
