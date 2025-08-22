<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Staff;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    //todo: function show all product
    public function index()
    {
        $products = Product::paginate(5); //note: Show 5 pro in a page
        $totalProducts = Product::count();
        $totalStaffs = Staff::count();
        $totalUsers = User::count();
        return view('products.index', compact('products', 'totalProducts', 'totalStaffs', 'totalUsers'));
    }
    //todo: show fm for add new Prodcut
    public function create()
    {
        return view('products.create');
    }

    //note: function for insert data into database
    public function store(Request $request)
    {
        $imagePath = null; //note: Initialize as null
        //note: Validate the input data to check it is have data or check any errors
        $validate = $request->validate([
            Product::NAME => 'required|string|max:255',
            Product::PRICE => 'required|numeric|min:0',
            Product::QUANTITY => 'required|integer|min:0',
            Product::STATUS => 'nullable|string|max:50',
            Product::SELL_DATE => 'nullable|date',
            Product::IMAGE => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);


        //note: Image handling
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/products/' . $imageName; //note: This path is saved to DB
            $image->move(public_path('uploads/products'), $imageName); //note: save file to the public/uploads
        }

        //note: save to database
        Product::create([
            Product::NAME   => $validate[Product::NAME],
            Product::PRICE  => $validate[Product::PRICE],
            Product::QUANTITY   => $validate[Product::QUANTITY],
            Product::STATUS  => $validate[Product::STATUS] ?? null, //note: Default value if null
            Product::SELL_DATE => $validate[Product::SELL_DATE] ?? null,
            Product::IMAGE => $imagePath,
        ]);

        //note: Redirect back with success message
        return redirect()->back()->with([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Added Successfully!' //note: this will be used for the message
        ]);
    }

    //todo: Show the edit form
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
            Product::IMAGE => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',//note: Add image validation
        ]);
        //note: Image handling ()
        if ($request->hasFile(Product::IMAGE)) {
            //note: Delete old image if exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $image = $request->file(Product::IMAGE);
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
            $imagePath = 'uploads/products' . $imageName;

            //note: Assign image path to product
            $product->image = $imagePath;
        }
        //note: Update fields
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->status = $request->has(Product::STATUS) ? $request->status : 0;
        $product->sell_date = $request->sell_date;
        //note: Save changes
        $product->save();
        //note: Redirect back with success message
        return redirect()->back()->with([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Updated Successfully!' //note: this will be used for the message
        ]);
    }

    //todo: function remove product
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        //note: Delete the product image if it exists
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        Product::find($id)->delete();

        return redirect()->back()->with([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Deleted Successfully!' //note: this will be used for the message
        ]);
    }
}
