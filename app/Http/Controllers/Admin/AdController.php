<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::where('title', '!=', 'single_image')->get();
        $previousSecondaryImage = Ad::where('title', 'single_image')->first();
        // dd($ads);
        return view('admin.ads_page.index', compact('ads', 'previousSecondaryImage'));
    }

    public function create()
    {
        return view('admin.ads_page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $ad = new Ad();
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $imagePath = $request->image->storeAs('ad_images', $imageName, 'public');
            $ad->image = $imagePath;
        }
        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->save();

        return redirect()->route('ad.index')->with('success', 'Ad created successfully');
    }

    public function show($id)
    {
        $ad = Ad::findOrFail($id);
        $categories = Category::whereNull('parent_id')->with('children')->get();

        return view('frontend.marketplace.ad-details', compact('ad', 'categories'));
    }


    public function edit($id)
    {
        $ad = Ad::find($id);
        return view('admin.ads_page.edit', compact('ad'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $ad = Ad::find($id);
        $ad->title = $request->title;
        $ad->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $imagePath = $request->image->storeAs('ad_images', $imageName, 'public');
            $ad->image = $imagePath;
        }

        $ad->save();

        return redirect()->route('ad.index')->with('success', 'Ad updated successfully');

    }

    public function destroy($id)
    {
        $ad = Ad::find($id);
        $ad->delete();
        return redirect()->route('ad.index')->with('success', 'Ad deleted successfully');
    }


    public function updateSecondaryImage(Request $request)
    {
        $request->validate([
            'secondary_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('secondary_image')) {
            $secondaryImageName = time() . '_secondary.' . $request->secondary_image->getClientOriginalExtension();
            $secondaryImagePath = $request->secondary_image->storeAs('ad_images', $secondaryImageName, 'public');

            $adsec = Ad::updateOrCreate(
                ['title' => 'single_image'],
                ['image' => $secondaryImagePath]
            );
        }

        return redirect()->route('ad.index')->with('success', 'Secondary image uploaded successfully');
    }

}
