<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class UserWebController extends Controller
{
    // function show all
    public function index()
    {
        $users = User::all();
        $totalProducts = Product::count();
        $totalStaffs = Staff::count();
        $totalUsers = User::count();
        return view('admin.users.index', compact('users', 'totalProducts', 'totalStaffs', 'totalUsers'));
    }

    // function create user
    public function create()
    {
        return view('admin.users.create');
    }
}
