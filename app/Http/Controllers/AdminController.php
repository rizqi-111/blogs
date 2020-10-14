<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserPublishNotificationMail;

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
        $user = $blog->user;
        $blog->status = '1';
        $blog->save();

        Mail::to($user)->send(new UserPublishNotificationMail($user,$blog));

        return redirect(route('admin.home'));
    }
}
