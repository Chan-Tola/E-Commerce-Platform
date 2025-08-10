<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;

class AuthenticationController extends Controller
{
    //
    public function loginForm()
    {
        return view('auth.login');
    }
    //TODO: function check login
    public  function login(Request $request)
    {

        //NOTE: Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
        //note: If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        //note: Get validated data
        $data = $validator->validated();
        //note: Attempt authentication
        if (Auth::guard('staff')->attempt($data)) {
            $user = Auth::guard('staff')->user();
            /** @var Staff|null $user */  //todo: Helps editor know $user is Staff model
            if ($user) {
                $user->status = 'active'; //todo: Set the user's status to offline
                $user->save();
            }
            return redirect()->route('index')->with([
                'sweet-alert' => true,
                'type' => 'success', //note: this will be used for the icon
                'alert-message' => 'Welcome back ' . fullName(Auth::guard('staff')->user()),
            ]);
        }
        return redirect()->route('login')->with([
            'sweet-alert' => true,
            'alert-message' => 'Wrong password or email!'
        ]);
    }

    //TODO: function logout
    public function logout(Request $request)
    {
        $user = Auth::guard('staff')->user();
        /** @var Staff|null $user */  //todo: Helps editor know $user is Staff model
        if ($user) {
            $user->status = 'offline'; //todo: Set the user's status to offline
            $user->save();
        }
        Auth::guard('staff')->logout(); //NOTE: Logout the user from the 'staff' guard
        return  redirect()->route('login');
    }
}
