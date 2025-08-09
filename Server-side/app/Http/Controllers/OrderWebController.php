<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class OrderWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $totalProducts = Product::count();
        $totalStaffs = Staff::count();
        $totalUsers = User::count();
        // get all product to show
        $orders  = Order::all();
        return view('admin.orders.index', compact('orders', 'totalProducts', 'totalStaffs', 'totalUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
