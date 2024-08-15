<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display a listing of orders
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    // Show the form for creating a new order
    public function create()
    {
        return view('orders.create');
    }

    // Store a newly created order in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'total_amount' => 'required|numeric',
            'order_status' => 'required|string',
            'payment_status' => 'required|string',
        ]);

        Order::create($validatedData);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    // Display the specified order
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // Show the form for editing the specified order
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    // Update the specified order in storage
    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'total_amount' => 'required|numeric',
            'order_status' => 'required|string',
            'payment_status' => 'required|string',
        ]);

        $order->update($validatedData);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    // Remove the specified order from storage
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
