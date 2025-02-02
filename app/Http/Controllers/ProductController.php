<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display a listing of the products
    public function viewproducts()
    {
        $products = Product::all();
        return view('Admin.Products.viewproducts', compact('products'));
    }


    // Show the form for creating a new product
    public function productsform() {
        return view('Admin.Products.postproduct');
    }

    // Store a newly created product in storage
    public function createproduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Display the specified product
    public function showproduct(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Show the form for editing the specified product
    public function editproduct(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified product in storage
    public function updateproduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from storage
    public function destroyproduct(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
