<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    public function loginForm()
    {
        return view('auth.login');
    }
    // function check login
    public  function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // checking account
        if (Auth::guard('staff')->attempt($data)) {
            return redirect()->route('index')->with([
                'sweet-alert' => true,
                'alert-message' => 'Welcome back ' . fullName(Auth::guard('staff')->user()),
            ]);
        }
        return redirect()->route('login')->with([
            'sweet-alert' => true,
            'alert-message' => 'Wrong password or email!'
        ]);
    }

    // function logout
    public function logout(Request $request)
    {
        Auth::guard('staff')->logout(); //Use staff guard

        //        $request->session()->invalidate();
        //        $request->session()->regenerateToken();
        //
        return  redirect()->route('login');
    }
}
