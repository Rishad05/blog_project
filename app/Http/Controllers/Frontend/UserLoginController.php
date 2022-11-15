<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function authorLogin(){
        return view('frontend.layouts.authorLogin');
    }
    public function userLogin(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6',
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('authorDashboard');
        }
        return back()->withErrors([
            'email'=>"Invalid credentials!!"
        ]);
    }

    public function userLogout(){
        Auth::logout();
        return redirect()->route('authorLogin');
    }
}
