<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(4)->get();
        return view('frontend.index', compact('products'));
    }

    public function about_us()
    {
        return view('frontend.about-us');
    }
    public function market_terms()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('frontend.marketplace.barter_terms', compact('categories'));
    }
    public function contact_us()
    {
        return view('frontend.contact-us');
    }
    public function faqs()
    {
        return view('frontend.faqs');
    }
    public function privacy_policy()
    {
        return view('frontend.privacy_policy');
    }
    public function refund_policy()
    {
        return view('frontend.refund_policy');
    }
    public function marketplace()
    {
        $activeProducts = Product::active()->get();
        $categories = Category::whereNull('parent_id')->with('children')->get();


        $ads = Ad::where('title', '!=', 'single_image')->get();
        // dd($ads);
        $firstAd = Ad::where('title', 'single_image')->first();

        return view('frontend.marketplace.marketplace', [
            'products' => $activeProducts,
            'categories' => $categories,
            'ads' => $ads,
            'firstAd' => $firstAd
        ]);
    }

    public function details($id)
    {
        $data['product'] = Product::active()->findOrFail($id);
        $data['relatedProducts'] = Product::where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(10)
            ->get();

        $data['categories'] = Category::whereNull('parent_id')->with('children')->get();
        return view('frontend.marketplace.productdetails', $data);
    }
    // ProductController.php
    public function showCategoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->select('id')->firstOrFail();
        $categories = Category::whereNull('parent_id')->with('children')->get();
        // Category slug ke basis pr products ko fetch karo
        // dd($category->id);
        $products = Product::where('category', $category->id)->get();

        // Return karo view ko jo products ko display karega
        return view('frontend.marketplace.products', compact('products', 'slug', 'categories'));
    }
    public function search(Request $request)
    {
        // Validate search inputs if necessary
        $request->validate([
            'x' => 'nullable|string|max:255',
            'searchType' => 'nullable',
            'search_param' => 'nullable|string|max:255',
        ]);

        // Fetch top-level categories with their children for the dropdown
        $categories = Category::whereNull('parent_id')->with('children')->get();

        // Retrieve search parameters
        $searchParam = $request->input('search_param', 'shirt'); // Adjust default as needed
        $query = $request->input('x'); // Search text
        $searchType = $request->input('searchType', 'all'); // Category ID or "all"

        // Initialize the product query
        $productsQuery = Product::query();

        // If a search text is provided, filter by name or description
        if ($query) {
            $productsQuery->where(function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%");
            });
        }

        // If a specific category is selected and not 'all', filter by category_id
        if ($searchType && $searchType != 'all') {
            $productsQuery->where('category', $searchType);
        }

        // Execute the query with pagination
        $products = $productsQuery->paginate(15)->appends($request->all());

        return view('frontend.marketplace.products_search', compact('categories', 'products', 'searchParam', 'query', 'searchType'));
    }

}
