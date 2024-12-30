<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::active()->where('feature', true)->get();
        return view("admin.features", compact('featuredProducts'));
    }
}
