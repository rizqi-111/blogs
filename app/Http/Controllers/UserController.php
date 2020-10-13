<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){
        $blog = Blog::all();
        return view('user/dashboard')->with(compact('blog'));
    }

    public function makeblog(){
        return view('user/create');
    }
}
