<?php

namespace App\Http\Controllers;

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
        $this->middleware(['auth', 'verified'])->only(['app']);
        $this->middleware(['guest'])->only(['index']);
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
        $archive_id = $user->archives()->pluck('id')->first();
        return view('app', compact(['archive_id', 'labels']));
    }

    public function labels()
    {
        $colors = Color::all();
        $labels = auth()->user()->labels->sortBy('order');
        return view('labels', compact(['labels', 'colors']));
    }
}
