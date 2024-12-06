<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function index(){
        $products = Product::with('images')->get();
        return view('admin.product_page', compact('products'));
    }

}
