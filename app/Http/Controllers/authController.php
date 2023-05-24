<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
    public function authenticate(Request $request)
    { 
        $request->validate([ 
        "email"=>["required","email"], 
        "password"=>["required"]]); 

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Session::put('normal', auth()->user()->id);
            return redirect()->intended("list")->with("success", "You are logged in");
        }

        return back()->withErrors(["email"=>"Invalid Credentials"]);
    } 

    public function login(Request $request)
    {
        $request->validate([
            'email' => ["required","email"],
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            auth()->user()->generateCode();
            return redirect()->route('2fa.index');
        }
    
        return back()->withErrors(["email"=>"Invalid Credentials"]); 
    }

    public function logout(Request $request){ 
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        return redirect()->route("list")->with("message","You have been logged out!"); 
    }
}
