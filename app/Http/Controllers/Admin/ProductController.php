<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Notifications\NewBarterListNotification;
use Auth;
use Illuminate\Http\Request;
use Notification;
use Str;

class ProductController extends Controller
{
    public function feature(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:products,id',
            'action' => 'required|in:feature,unfeature',
        ]);

        try {
            $product = Product::findOrFail($request->id);

            if ($request->action === 'feature') {
                $product->feature = true;
                $messageTitle = 'Featured!';
                $message = 'The product has been featured.';
            } else { // 'unfeature'
                $product->feature = false;
                $messageTitle = 'Unfeatured!';
                $message = 'The product feature has been removed.';
            }

            $product->save();

            return response()->json([
                'success' => true,
                'messageTitle' => $messageTitle,
                'message' => $message
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to process the request.'], 500);
        }
    }

    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $products = Product::with('images')->get();
        } else {
            $products = Product::with('images')->where('user_id', auth()->id())->get();
        }

        return view('admin.product_page', compact('products'));
    }


    // Show the form for creating a new product.
    public function create()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('products.edit', compact('categories'));
    }

    // Store a newly created product in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'nullable',
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|max:2048',
        ]);


        try {
            $product = Product::create([
                'name' => $validatedData['name'],
                'category' => $validatedData['category'],
                'description' => $validatedData['description'],
                'auction' => $validatedData['auction'] ?? 0,
                'user_id' => Auth::id(),
                'is_active' => true,
            ]);

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


            if (!auth()->user()->hasRole('admin')) {
                $adminUser = User::role('admin')->get();

                if (count($adminUser) > 0) {
                    // $adminUser->notify(new NewBarterListNotification($product));
                    Notification::send($adminUser, new NewBarterListNotification($product));
                }
            }

        } catch (\Exception $e) {
            // throw $e;
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
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('products.edit', compact('product', 'categories'));
    }

    // Update the specified product in storage.
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'description' => 'nullable',
            'is_active' => 'boolean',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|max:2048',
        ]);

        try {
            unset($validatedData['images']);
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
