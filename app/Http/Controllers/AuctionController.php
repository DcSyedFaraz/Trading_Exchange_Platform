<?php

namespace App\Http\Controllers;

use App\Models\AuctionProduct;
use App\Models\Bid;
use App\Models\Category;
use App\Models\State;
use App\Models\User;
use App\Notifications\NewBidOnAuctionNotification;
use Auth;
use Illuminate\Http\Request;
use Notification;

class AuctionController extends Controller
{
    public function terms_auction()
    {
        // dd('s');
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('frontend.auction.terms', compact('categories'));
    }
    public function index()
    {
        $states = State::select('iso2', 'name')->get();
        $products = AuctionProduct::active()->paginate(11);
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('frontend.auction.index', compact('products', 'categories', 'states'));	
    }

    public function show($id)
    {
        $product = AuctionProduct::active()->findOrFail($id);
        $categories = Category::whereNull('parent_id')->with('children')->get();
        // dd(\Carbon\Carbon::now());
        $product->closeAuction();
        return view('frontend.auction.show', compact('product', 'categories'));
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
        $userid = Auth::id();
        $product = AuctionProduct::findOrFail($productId);
        if ($product->is_closed) {
            return redirect()->back()->with('error', 'Auction is closed.');
        }

        // Ensure the bid is higher than the minimum bid
        if ($request->bid_amount < $product->minimum_bid) {
            return redirect()->back()->with('error', 'Bid must be higher than the minimum bid.');
        }
        if ($userid == $product->user_id) {
            return redirect()->back()->with('error', 'You cannot place a bid on your own product.');
        }


        // Ensure the bid is higher than the current highest bid
        $highestBid = $product->highestBid;
        if ($highestBid && $request->bid_amount <= $highestBid->amount) {
            return redirect()->back()->with('error', 'Bid must be higher than the current highest bid.');
        }

        // Save the bid
        $bid = Bid::create([
            'auction_product_id' => $productId,
            'amount' => $request->bid_amount,
            'user_id' => $userid,
        ]);
        $product->highest_bid = $request->bid_amount;
        $product->save();

        $adminUser = User::role('admin')->first();
        if ($adminUser) {
            // $adminUser->notify(new NewBidOnAuctionNotification($product,  $bid));
            Notification::send($adminUser, new NewBidOnAuctionNotification($product, $bid));
        }
        $productUser = User::find($product->user_id);
        if ($productUser) {
            Notification::send($productUser, new NewBidOnAuctionNotification($product, $bid));
        }


        return redirect()->route('auction.show', $productId)->with('success', 'Bid placed successfully!');
    }
}
