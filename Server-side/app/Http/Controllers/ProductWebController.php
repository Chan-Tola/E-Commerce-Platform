<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Staff;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
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
        return view('products.index', compact('products', 'totalProducts', 'totalStaffs', 'totalUsers'));
    }
    // fn show fm for add new Prodcut
    public function create()
    {
        return view('products.create');
    }

    //fn for insert data into database
    public function store(Request $request)
    {
        $imagePath = null; // Initialize as null
        // Validate the input data to check it is have data or check any errors
        $validate = $request->validate([
            Product::NAME => 'required|string|max:255',
            Product::PRICE => 'required|numeric|min:0',
            Product::QUANTITY => 'required|integer|min:0',
            Product::STATUS => 'nullable|string|max:50',
            Product::SELL_DATE => 'nullable|date',
            Product::IMAGE => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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
            Product::NAME   => $validate[Product::NAME],
            Product::PRICE  => $validate[Product::PRICE],
            Product::QUANTITY   => $validate[Product::QUANTITY],
            Product::STATUS  => $validate[Product::STATUS] ?? null, // Default value if null
            Product::SELL_DATE => $validate[Product::SELL_DATE] ?? null,
            Product::IMAGE => $imagePath,
        ]);
        return redirect()->back()->with([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Added Successfully!' //note: this will be used for the message
        ]);
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
            Product::NAME => 'required|string|max:255',
            Product::PRICE => 'required|numeric|min:0',
            Product::QUANTITY => 'required|integer|min:0',
            Product::STATUS => 'nullable|string',
            Product::SELL_DATE => 'required|date',
            Product::IMAGE => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Add image validation
        ]);
        // Image handling ()
        if ($request->hasFile(Product::IMAGE)) {
            // Delete old image if exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $image = $request->file(Product::IMAGE);
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
        $product->status = $request->has(Product::STATUS) ? $request->status : 0;
        $product->sell_date = $request->sell_date;

        $product->save();

        return redirect()->back()->with([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Updated Successfully!' //note: this will be used for the message
        ]);
    }

    // function remove product
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        // Delete the product image if it exists
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        Product::find($id)->delete();
        return response()->json([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Added Successfully!' //note: this will be used for the message
        ]);
    }
}
