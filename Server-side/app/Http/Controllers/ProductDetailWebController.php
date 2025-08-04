<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class ProductDetailWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalProducts = Product::count();
        $totalStaffs = Staff::count();
        $totalUsers = User::count();
        $productDetails = ProductDetail::with('product')->get();
        return view('products.product_details.index', compact('totalProducts', 'totalStaffs', 'totalUsers', 'productDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productDetails = Product::get();
        return view('products.product_details.create', compact('productDetails'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'alert_type' => 'success',
            'alert_message' => 'Product detail created successfully!',
            'alert_title' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product_detail = ProductDetail::find($id);
        return view('products.product_details.edit', compact('product_detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            ProductDetail::UNITPRICE => 'nullable|numeric|min:0',
            ProductDetail::ADMIN_NOTES => 'nullable|string',
        ]);
        $updated = ProductDetail::findOrFail($id);
        $updated->update($validate);
        return redirect()->back()->with([
            'alert_type' => 'success',
            'alert_message' => 'Product detail updated successfully!',
            'alert_title' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $product_detail = ProductDetail::findOrFail($id);
        return view('products.product_details.delete', compact('product_detail'));
    }
    public function destroy(string $id)
    {
        $deleted = ProductDetail::findOrFail($id);
        $deleted->delete();
        return redirect()->back()->with([
            'alert_type' => 'info',
            'alert_message' => 'Product detail deleted successfully!',
            'alert_title' => 'success',
        ]);
    }
}
