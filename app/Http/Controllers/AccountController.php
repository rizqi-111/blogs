<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Response;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function login($role){
        return view($role.'/login');
    }
    
    public function register($role){
        return view(''.$role.'/register');
    }

    public function store(Request $request,$role){
        
        if($role == "admin"){
            $roleid = '1';
        } else {
            $roleid = '0';
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
        $acc = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'role' => $roleid
        ]);
        
        if($acc){
            $data = ['email'=>request('email'),'password'=>request('password')];
            Auth::attempt($data);
            if($role == "admin"){
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('user.home');
            }
        }
    }

    public function auth(Request $request,$role){
        $data = [
            'email'     => request('email'),
            'password'  => request('password'),
        ];

        Auth::attempt($data);
 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            if($role == "admin"){
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('user.home');
            }
        } else { // false
 
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return view($role.'/register');
        }
    }
}
