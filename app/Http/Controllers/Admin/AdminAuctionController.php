<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuctionProduct;
use App\Models\AuctionProductImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Storage;

class AdminAuctionController extends Controller
{
    public function index()
    {
        $products = AuctionProduct::with('user')->get();
        return view('admin.auction_products.index', compact('products'));
    }


    public function create()
    {
        return view('admin.auction_products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'state' => 'required|string',
            'province' => 'required|string',
            'minimum_bid' => 'required|numeric',
            'auction_end_time' => 'required|date',
            'images' => 'required|array|min:1',
            'images.*' => 'mimes:jpg,jpeg,png|max:2048',
        ]);


        $auctionProduct = AuctionProduct::create([
            'name' => $request->name,
            'description' => $request->description,
            'state' => $request->state,
            'province' => $request->province,
            'minimum_bid' => $request->minimum_bid,
            'auction_end_time' => Carbon::parse($request->auction_end_time),
            'is_closed' => false,
            'is_active' => true,
            'user_id' => auth()->id(),
        ]);


        foreach ($request->file('images') as $image) {
            $path = $image->store('auction_product_images', 'public');
            AuctionProductImage::create([
                'auction_product_id' => $auctionProduct->id,
                'image_path' => $path,
            ]);
        }

        return redirect()->route('auction_products.index')->with('success', 'Auction Product Created Successfully!');
    }


    public function edit(AuctionProduct $auctionProduct)
    {
        return view('admin.auction_products.edit', compact('auctionProduct'));
    }


    public function update(Request $request, AuctionProduct $auctionProduct)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'state' => 'required|string',
            'province' => 'required|string',
            'minimum_bid' => 'required|numeric',
            'auction_end_time' => 'required|date',
            'images.*' => 'mimes:jpg,jpeg,png|max:2048',
        ]);


        $auctionProduct->update([
            'name' => $request->name,
            'description' => $request->description,
            'state' => $request->state,
            'province' => $request->province,
            'minimum_bid' => $request->minimum_bid,
            'auction_end_time' => Carbon::parse($request->auction_end_time),
            'is_closed' => $request->has('is_closed') ? true : false,
            'is_active' => $request->has('is_active') ? true : false,
        ]);


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('auction_products', 'public');
                $auctionProduct->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('auction_products.index')->with('success', 'Auction Product Updated Successfully!');
    }


    public function destroy(AuctionProduct $auctionProduct)
    {
        $auctionProduct->delete();
        return redirect()->route('auction_products.index')->with('success', 'Auction Product Deleted Successfully!');
    }
    public function destroyImage(AuctionProduct $auctionProduct, AuctionProductImage $image)
    {
        // Check if the image belongs to the auction product
        if ($auctionProduct->id !== $image->auction_product_id) {
            return redirect()->route('auction_products.edit', $auctionProduct)->with('error', 'Invalid image for this product.');
        }

        // Delete the image file from storage
        Storage::delete("public/{$image->image_path}");  // Assuming images are stored in storage/app/public

        // Delete the image record from the database
        $image->delete();

        return redirect()->route('auction_products.edit', $auctionProduct)->with('success', 'Image deleted successfully.');
    }

}
