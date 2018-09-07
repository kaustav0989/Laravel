<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard')
                ->with('posts',Post::all())
                ->with('users',User::all())
                ->with('categories',Category::all())
                ->with('trashed',Post::onlyTrashed()->get());
    }
}
