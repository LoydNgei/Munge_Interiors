<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingController extends Controller
{
        // Display a listing of billing information
        public function index()
        {
            $billings = Billing::all();
            return view('billings.index', compact('billings'));
        }
    
        // Show the form for creating new billing information
        public function create()
        {
            return view('billings.create');
        }
    
        // Store newly created billing information in storage
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,user_id',
                'billing_address' => 'required|string',
                'user_card_number' => 'required|string',
            ]);
    
            Billing::create($validatedData);
    
            return redirect()->route('billings.index')->with('success', 'Billing information created successfully.');
        }
    
        // Display the specified billing information
        public function show(Billing $billing)
        {
            return view('billings.show', compact('billing'));
        }
    
        // Show the form for editing the specified billing information
        public function edit(Billing $billing)
        {
            return view('billings.edit', compact('billing'));
        }
    
        // Update the specified billing information in storage
        public function update(Request $request, Billing $billing)
        {
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,user_id',
                'billing_address' => 'required|string',
                'user_card_number' => 'required|string',
            ]);
    
            $billing->update($validatedData);
    
            return redirect()->route('billings.index')->with('success', 'Billing information updated successfully.');
        }
    
        // Remove the specified billing information from storage
        public function destroy(Billing $billing)
        {
            $billing->delete();
    
            return redirect()->route('billings.index')->with('success', 'Billing information deleted successfully.');
        }
}
