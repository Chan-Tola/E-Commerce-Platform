<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    // function show all product
    public function index()
    {
        // this is function to get all product
        // $products = Product::all();
        $products = Product::paginate(5); // Show 5 pro in a page
        $totalProducts = Product::count();
        $totalStaffs = Staff::count();
        $totalUsers = User::count();
        return view('products.index', compact('products','totalProducts', 'totalStaffs', 'totalUsers'));
    }
    // fn show fm for add new Prodcut
    public function create()
    {
        return view('products.create');
    }

    //fn for insert data into database
    public function store(Request $request)
    {
        // Validate the input data to check it is have data or check any errors
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'status' => 'nullable|string|max:50',
            'status' => 'nullable|string|max:50',
            'sell_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // ✅ Image handling
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/' . $imageName; // This path is saved to DB
            $image->move(public_path('uploads'), $imageName); // save file to the public/uploads
        }

        //save to database
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => $request->status ?? 'normal', // Default value if null
            'sell_date' => $request->sell_date,
            'image' => $imagePath,
        ]);
 
        return redirect('/product/create')->with('success', 'Created');
    }

    // Show the edit form
    public function edit($id) 
    {
        $product = Product::find($id);
        return view('products.update', compact('product'));
    }

    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'status' => 'nullable|string|max:50',
            'sell_date' => 'nullable|date',
        ]);

        // Image handling ()
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $imagePath = 'uploads/' . $imageName;

            // Assign image path to product
            $product->image = $imagePath;
        }
        // Update fields
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->status = $request->has('status') ? $request->status : 0;
        $product->sell_date = $request->sell_date;

        $product->save();
        return back()->with('success', 'Product updated successfully!');
    }

    // function remove product
    public function delete($id)
    {
        Product::find($id)->delete();
        return response()->json(['success' => true, 'message' => 'Product deleted successfully!']);
    }
} 