<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function about_us()
    {
        return view('frontend.about-us');
    }
    public function contact_us()
    {
        return view('frontend.contact-us');
    }
    public function faqs()
    {
        return view('frontend.faqs');
    }
    public function marketplace()
    {
        $activeProducts = Product::active()->get();
        return view('frontend.marketplace.marketplace', ['products' => $activeProducts]);
    }

    public function details($id)
    {
        $data['product'] = Product::active()->findOrFail($id);
        $data['relatedProducts'] = Product::where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(10)
            ->get();

        return view('frontend.marketplace.productdetails', $data);
    }
}
