<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Auth;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show the form for creating a new product.
    public function create()
    {
        return view('products.create');
    }

    // Store a newly created product in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sku' => 'required|unique:products,sku',
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'auction' => 'boolean',
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|max:2048',
        ]);

        $validatedData['user_id'] = Auth::id();

        try {
            $product = Product::create($validatedData);

            // Handle file uploads
            if ($request->has('images')) {
                foreach ($request->file('images') as $image) {

                    $fileName = Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs('product_images', $fileName, 'public');

                    $product->images()->create([
                        'path' => $path,
                    ]);
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Display the specified product.
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Show the form for editing the specified product.
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified product in storage.
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'sku' => "required|unique:products,sku,{$product->id}",
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'is_active' => 'boolean',
            'auction' => 'boolean',
        ]);

        try {
            $product->update($validatedData);

            // Handle file uploads
            if ($request->has('images')) {
                foreach ($request->file('images') as $image) {

                    $fileName = Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs('product_images', $fileName, 'public');

                    $product->images()->create([
                        'path' => $path,
                    ]);
                }
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from storage.
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    public function destroyImage($id)
    {
        $image = ProductImage::find($id);
        if ($image) {
            $image->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
