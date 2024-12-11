<?php

namespace App\Http\Controllers;

use App\Models\AuctionProduct;
use App\Models\Bid;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index()
    {
        $products = AuctionProduct::active()->paginate(11);
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('frontend.auction.index', compact('products','categories'));
    }
    public function show($id)
    {
        $product = AuctionProduct::active()->findOrFail($id);
        $categories = Category::whereNull('parent_id')->with('children')->get();
        // dd(\Carbon\Carbon::now());
        $product->closeAuction();
        return view('frontend.auction.show', compact('product','categories'));
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'minimum_bid' => 'required|numeric',
            'auction_end_time' => 'required|date',
        ]);
        $validated['user_id'] = Auth::id();
        $auctionProduct = AuctionProduct::create($validated);
        return redirect()->route('auction.show', $auctionProduct->id);
    }

    // Place a bid
    public function placeBid(Request $request, $productId)
    {
        $request->validate([
            'bid_amount' => 'required|numeric|min:0.01',
        ]);

        $product = AuctionProduct::findOrFail($productId);
        if ($product->is_closed) {
            return redirect()->back()->with('error', 'Auction is closed.');
        }

        // Ensure the bid is higher than the minimum bid
        if ($request->bid_amount < $product->minimum_bid) {
            return redirect()->back()->with('error', 'Bid must be higher than the minimum bid.');
        }

        // Ensure the bid is higher than the current highest bid
        $highestBid = $product->highestBid;
        if ($highestBid && $request->bid_amount <= $highestBid->amount) {
            return redirect()->back()->with('error', 'Bid must be higher than the current highest bid.');
        }

        // Save the bid
        Bid::create([
            'auction_product_id' => $productId,
            'amount' => $request->bid_amount,
            'user_id' => Auth::id(),
        ]);
        $product->highest_bid = $request->bid_amount;
        $product->save();

        return redirect()->route('auction.show', $productId)->with('success', 'Bid placed successfully!');
    }
}
