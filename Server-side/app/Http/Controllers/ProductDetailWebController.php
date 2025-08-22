<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class ProductDetailWebController extends Controller
{
    //todo: function show all product detail
    public function index()
    {
        $totalProducts = Product::count();
        $totalStaffs = Staff::count();
        $totalUsers = User::count();
        $productDetails = ProductDetail::with('product')->get();
        return view('admin.product_details.index', compact('totalProducts', 'totalStaffs', 'totalUsers', 'productDetails'));
    }
    //todo: function for show form add new product detail
    public function create()
    {
        $productDetails = Product::get();
        return view('admin.product_details.create', compact('productDetails'));
    }
    //todo: function for insert data into database
    public function store(Request $request)
    {
        $request->validate([
            ProductDetail::PRODUCT_ID => 'required|exists:' . Product::TABLENAME . ',' . Product::ID,
            ProductDetail::UNITPRICE => 'nullable|numeric|min:0',
            ProductDetail::ADMIN_NOTES => 'nullable|string',
        ]);

        ProductDetail::create([
            ProductDetail::PRODUCT_ID => $request->input(ProductDetail::PRODUCT_ID),
            ProductDetail::UNITPRICE => $request->input(ProductDetail::UNITPRICE),
            ProductDetail::ADMIN_NOTES => $request->input(ProductDetail::ADMIN_NOTES),
        ]);
        return redirect()->back()->with([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Added Successfully!' //note: this will be used for the message
        ]);
    }
    //todo: function for show form edit product detail
    public function edit(string $id)
    {
        $product_detail = ProductDetail::find($id);
        return view('admin.product_details.edit', compact('product_detail'));
    }
    //todo: function for update product detail data
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            ProductDetail::UNITPRICE => 'nullable|numeric|min:0',
            ProductDetail::ADMIN_NOTES => 'nullable|string',
        ]);
        $updated = ProductDetail::findOrFail($id);
        $updated->update($validate);
        return redirect()->back()->with([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Updated Successfully!' //note: this will be used for the message
        ]);
    }

    //todo: function for show form delete product detail
    public function delete(string $id)
    {
        $product_detail = ProductDetail::findOrFail($id);
        return view('admin.product_details.delete', compact('product_detail'));
    }
    //todo: function for destroy product detail
    public function destroy(string $id)
    {
        $deleted = ProductDetail::findOrFail($id);
        $deleted->delete();
        return redirect()->back()->with([
            'sweet-alert' => true,
            'type' => 'success', //note: this will be used for the icon
            'alert-message' => 'Deleted Successfully!' //note: this will be used for the message
        ]);
    }
}
