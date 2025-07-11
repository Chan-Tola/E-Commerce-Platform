<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            User::USERNAME => 'required|string|max:255',
            User::USEREMAIL => 'required|string|email|unique:users,' . User::USEREMAIL,
            User::USERPASSWORD => 'required|string|min:6',
            User::USERCONTACT => 'nullable|string|max:20',
            User::USEREADDRESS => 'nullable|string|max:255',
            User::USERROLE => 'user', // Force the role to 'user'
        ]);

        // check for security
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // place create user
        $user = User::create([
            User::USERNAME => $request->input(User::USERNAME),
            User::USEREMAIL => $request->input(User::USEREMAIL),
            User::USERPASSWORD => Hash::make($request->input(User::USERPASSWORD)),
            User::USERCONTACT => $request->input(User::USERCONTACT),
            User::USEREADDRESS => $request->input(User::USEREADDRESS),
            User::USERROLE => 'user', // 🔒 always set as 'user'
        ]);
    }

    // login
    public function login(Request $request){
        
    }
}