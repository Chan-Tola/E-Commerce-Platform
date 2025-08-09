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
        return view('admin.staffs.index', compact('staffs', 'totalProducts', 'totalStaffs', 'totalUsers'));
    }

    // show form for add new staff
    public function create()
    {
        return view('admin.create');
    }
    // fn for insert data into database
    public function store(Request $request) {}

    // show form for edit staff
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staffs.edit', compact('staff'));
    }
    // fn for update staff data
    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
    }
}
