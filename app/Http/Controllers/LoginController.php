<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginprocess(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        };
        
            return redirect('/login');
    }


    public function register(){
        return view('register');
    }

    public function registerprocess(Request $request){
        //dd($request->all());

        $this->validate($request,[
            'name' => 'required|min:5|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token'=> Str::random(60),
        ]);

        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
