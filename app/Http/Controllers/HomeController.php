<?php

namespace App\Http\Controllers;

use App\Models\Createpost;
use Illuminate\View\Component;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $createposts = Createpost::latest()->get();
        // dd($createposts);
        return view('home', compact('createposts'));
    }
}
