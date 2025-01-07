<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function plans()
    {
        $activeProducts = Product::active()->get();
        $categories = Category::whereNull('parent_id')->with('children')->get();

        $user = Auth::user();
        if(!$user){
            $intent = null;
        } else {
            $intent = auth()->user()->createSetupIntent();
        }

        return view('frontend.marketplace.plans',[
            'products' => $activeProducts,
            'categories' => $categories,
            'intent' => $intent,
        ]);
    }
    public function planssubscription(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to proceed.');
        }

        $intent = auth()->user()->createSetupIntent();

        return view("frontend.marketplace.plans", compact("plan", "intent"));
    }

    public function planssuccess(Request $request)
    {
        try {

            $subscription = $request->user()
            ->newSubscription('ANNUAL MEMBERSHIP', 'price_1QeeNyEvBehh4H8KxwMnhds3')
            ->create($request->token);

            return redirect()->route('plans')
                ->with('success', 'Subscription purchased successfully!');
        } catch (\Exception $e) {
            return redirect()->route('plans')
                ->with('error', 'There was an issue with your subscription.');
        }
    }
}
