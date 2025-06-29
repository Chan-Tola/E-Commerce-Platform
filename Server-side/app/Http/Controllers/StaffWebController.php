<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;

class StaffWebController extends Controller
{
    public function index()
    {
        // this is function to get all product
        $staffs = Staff::all();
        $totalProducts = Product::count();
        $totalStaffs = Staff::count();
        $totalUsers = User::count();
        return view('admin.staffs',compact('staffs','totalProducts', 'totalStaffs', 'totalUsers'));
    }
}