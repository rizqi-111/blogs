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
        $blog = Blog::where('user_id',Auth::user()->id)->get();
        return view('user/dashboard')->with(compact('blog'));
    }

    public function makeblog(){
        return view('user/create');
    }

    public function postblog(Request $request){
        $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required', 'max:255']
        ]);
        
        $data = [
            'title' => request('title'),
            'content' => request('content'),
            'status' => '0'
        ];
        
        // $blog = Blog::create($data);
        $user = Auth::user();

        $blogg = new Blog($data);

        $blog = $user->blogs()->save($blogg);
        if($blog){
            return redirect()->route('user.home')->with('success','Blog Berhasil Dibuat');
        }
    }
}
