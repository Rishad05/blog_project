<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
// use App\Mail\RegistrationConfirmation;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;

class UserLoginRegistrationController extends Controller
{
    public function userLoginRegistration()
    {
        return view('frontend.layouts.authorRegistration');
    }

    public function userRegistration(Request $request)
    {
                $request->validate([
                    'name' => 'required',
                    'email'=>'email|required|unique:users',
                    'password' => 'required|min:6',
                ]);
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);
        event(new Registered($user));
        // Mail::to($user->email,)->send(new RegistrationConfirmation($user));
        return redirect()->route('authorDashboard');

    }
}
