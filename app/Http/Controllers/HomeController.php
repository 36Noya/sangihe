<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Submenu;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $submenus = Submenu::all();
        $multiplePostsId = ['7', '9', '10', '11', '12'];

        return view('post/post', ['submenus' => $submenus, 'multiplePostsId' => $multiplePostsId]);
    }

    public function login()
    {
        return view('home');
    }
}
