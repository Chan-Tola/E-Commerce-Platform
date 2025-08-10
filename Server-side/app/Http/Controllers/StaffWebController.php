<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;
use Carbon\Carbon;

class StaffWebController extends Controller
{
    public function index()
    {
        //TODO: This is function to get all product
        $staffs = Staff::all();
        $totalProducts = Product::count();
        $totalStaffs = Staff::count();
        $totalUsers = User::count();
        return view('admin.staffs.index', compact('staffs', 'totalProducts', 'totalStaffs', 'totalUsers'));
    }

    //NOTE: show form for add new staff
    public function create()
    {
        return view('admin.staffs.create');
    }
    //NOTE: fn for insert data into database
    public function store(Request $request)
    {
        // dd($request->all());

        //TODO: Validate incoming request data using model constants for keys
        $validate = $request->validate([
            Staff::PROFILE => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            Staff::FIRST_NAME => 'required|string|max:255',
            Staff::LAST_NAME => 'required|string|max:255',
            Staff::GENDER => 'nullable|in:male,female',    // Accept only 'M' or 'F'
            Staff::DOB => 'nullable|date',
            Staff::EMAIL => 'required|email|max:255|unique:' . Staff::TABLENAME . ',' . Staff::EMAIL,
            Staff::PASSWORD => 'required|string|min:8',
            Staff::ADDRESS => 'nullable|string|max:255',
            Staff::PHONE => 'nullable|string|max:15',

        ]);

        //NOTE: ✅Handle image upload if present
        $imagePath = null;

        if ($request->hasFile(Staff::PROFILE)) {
            $image = $request->file(Staff::PROFILE);
            $imageName = time() . '_' . $image->getClientOriginalName();
            //NOTE:This path is saved to DB
            $imagePath = 'uploads/profiles/' . $imageName;
            //NOTE: Move uploaded file to public/uploads/profiles directory
            $image->move(public_path('uploads/profiles'), $imageName);
        }

        //TODO: Create the new staff record
        Staff::create([
            Staff::PROFILE      =>  $imagePath,
            Staff::FIRST_NAME   =>  $validate[Staff::FIRST_NAME],
            Staff::LAST_NAME    =>  $validate[Staff::LAST_NAME],
            Staff::GENDER       =>  $validate[Staff::GENDER] ?? null,
            Staff::DOB          =>  $validate[Staff::DOB] ?? null,
            Staff::EMAIL        =>  $validate[Staff::EMAIL],
            Staff::PASSWORD     =>  bcrypt($validate[Staff::PASSWORD]),
            Staff::ADDRESS      =>  $validate[Staff::ADDRESS] ?? null,
            Staff::PHONE        =>  $validate[Staff::PHONE] ?? null,
            Staff::ROLE         =>  'staff', //TODO: Default role set as 'staff'
            Staff::HIRE_DATE    =>  now(), //TODO: Set hire date to current timestamp
            Staff::STATUS       =>  Staff::STATUS_ACTIVE, //TODO: Set default status to 'active'
        ]);
        // NOTE:Redirect back with success message
        return redirect()->back()->with([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Added Successfully!' //note: this will be used for the message
        ]);
    }

    //NOTE: show form for edit staff
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staffs.edit', compact('staff'));
    }
    //NOTE: fn for update staff data
    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
    }
}
