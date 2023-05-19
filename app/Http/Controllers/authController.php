<?php

namespace App\Http\Controllers;

use session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function authenticate(Request $request)
    { 
        $formfields = $request->validate([ 
        "email"=>["required","email"], 
        "password"=>"required" ]); 

        if(auth()->attempt($formfields)){ 
            $request->session()->regenerate(); 
        return redirect("/list")->with("message","You are now logged in"); 
        } 

        return back()->withErrors(["email"=>"Invalid Credentials"])->onlyInput("email"); 
    } 

    public function logout(Request $request){ 
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        return redirect("/")->with("message","You have been logged out!"); 
    }
}
