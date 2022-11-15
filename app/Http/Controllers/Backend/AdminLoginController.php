<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function adminLogin(){
        return view('backend.content.adminLogin');
    }

    public function accessLogin(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:6',
        ]);
        $credentials = $request->only('email', 'password');

        if(Auth:: attempt($credentials)){
            $request-> session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email' =>"Invalid credentials!!"
        ]);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Logout Successfully');
    }
}
