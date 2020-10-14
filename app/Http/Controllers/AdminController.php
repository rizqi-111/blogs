<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home(){
        $blog = Blog::orderBy('status','ASC')->get();
        return view('admin/dashboard')->with(compact('blog'));
    }

    public function verifikasi($id){
        $blog = Blog::find($id);

        $blog->status = '1';

        $blog->save();

        return redirect(route('admin.home'));
    }
}
