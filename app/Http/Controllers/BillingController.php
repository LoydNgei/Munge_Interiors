<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billing;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    // Show billing information for the authenticated user
    public function show()
    {
        $billing = Billing::where('user_id', Auth::id())->first();
        return view('Billing.billingForm', compact('billing'));
    }

    // Show the form to edit or create billing information
    public function edit($id)
    {
        $billing = Billing::findOrFail($id); 
        return view('Billing.billingForm', compact('billing'));
    }

    // Store new billing information
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'billing_address' => 'required|string|max:255',
            'user_card_number' => 'required|string|max:255',
        ]);

        // Create a new billing record for the authenticated user
        Billing::create([
            'user_id' => Auth::id(),
            'billing_address' => $validatedData['billing_address'],
            'user_card_number' => $validatedData['user_card_number'],
        ]);

        return redirect()->route('page.account')->with('success', 'Billing information created successfully.');
    }

    // Update existing billing information
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'billing_address' => 'required|string|max:255',
            'user_card_number' => 'required|string|max:255',
        ]);

        $billing = Billing::where('user_id', Auth::id())->first();

        if ($billing) {
            $billing->update($validatedData);
            return redirect()->route('page.account')->with('success', 'Billing information updated successfully.');
        }

        return redirect()->route('page.account')->with('error', 'Billing information not found.');
    }

    // Delete billing information
    public function destroy()
    {
        $billing = Billing::where('user_id', Auth::id())->first();

        if ($billing) {
            $billing->delete();
            return redirect()->route('page.account')->with('success', 'Billing information deleted successfully.');
        }

        return redirect()->route('page.account')->with('error', 'Billing information not found.');
    }
}