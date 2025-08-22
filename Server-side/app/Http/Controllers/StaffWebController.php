<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\User;

class StaffWebController extends Controller
{
    //todo: function show all staff
    public function index()
    {
        $staffs = Staff::all();
        $totalProducts = Product::count();
        $totalStaffs = Staff::count();
        $totalUsers = User::count();
        return view('admin.staffs.index', compact('staffs', 'totalProducts', 'totalStaffs', 'totalUsers'));
    }
    //todo: show form for add new staff
    public function create()
    {
        return view('admin.staffs.create');
    }
    //todo: function for insert data into database
    public function store(Request $request)
    {
        //note: Validate incoming request data using model constants for keys
        $validate = $request->validate([
            Staff::PROFILE => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            Staff::FIRST_NAME => 'required|string|max:255',
            Staff::LAST_NAME => 'required|string|max:255',
            Staff::GENDER => 'nullable|in:male,female', //note: Accept only 'M' or 'F'
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

        //note: Create the new staff record
        $staff = Staff::create([
            Staff::PROFILE      =>  $imagePath,
            Staff::FIRST_NAME   =>  $validate[Staff::FIRST_NAME],
            Staff::LAST_NAME    =>  $validate[Staff::LAST_NAME],
            Staff::GENDER       =>  $validate[Staff::GENDER] ?? null,
            Staff::DOB          =>  $validate[Staff::DOB] ?? null,
            Staff::EMAIL        =>  $validate[Staff::EMAIL],
            Staff::PASSWORD     =>  bcrypt($validate[Staff::PASSWORD]),
            Staff::ADDRESS      =>  $validate[Staff::ADDRESS] ?? null,
            Staff::PHONE        =>  $validate[Staff::PHONE] ?? null,
            Staff::ROLE         =>  'staff', //note: Default role set as 'staff'
            Staff::HIRE_DATE    =>  now(), //note: Set hire date to current timestamp
            Staff::STATUS       =>  Staff::STATUS_ACTIVE, //note: Set default status to 'active'
        ]);
        return redirect()->back()->with([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Added Successfully!' //note: this will be used for the message
        ]);
    }

    //todo: Show the edit form
    public function edit(string $id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staffs.edit', compact('staff'));
    }

    //todo: function for update staff data
    public function update(Request $request, string $id)
    {

        $validate = $request->validate([
            Staff::PROFILE => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            Staff::FIRST_NAME => 'required|string|max:255',
            Staff::LAST_NAME => 'required|string|max:255',
            Staff::DOB => 'nullable|date',
            Staff::ADDRESS => 'nullable|string|max:255',
            Staff::PHONE => 'nullable|string|max:15',
        ]);

        $staff = Staff::findOrFail($id);

        //note: Handle image upload if present
        if ($request->hasFile(Staff::PROFILE)) {
            $image = $request->file(Staff::PROFILE);
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/profiles'), $imageName);
            $imagePath = 'uploads/profiles/' . $imageName;

            //note: Add image path to validated data
            $validate[Staff::PROFILE] = $imagePath;
        }

        //note: Update all validated fields including image
        $staff->update($validate);
        return redirect()->back()->with([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Update Successfully!' //note: this will be used for the message
        ]);
    }

    //todo: function for show form delete staff
    public function delete(string $id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staffs.delete', compact('staff'));
    }

    //todo: function for destroy staff
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();
        // NOTE:Redirect back with success message that is the way I study
        return redirect()->back()->with([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Deleted Successfully!' //note: this will be used for the message
        ]);
    }
}
