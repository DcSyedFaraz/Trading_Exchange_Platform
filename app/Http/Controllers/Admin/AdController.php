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
        $ads = Ad::all();
        $ad = Ad::first();
        return view('admin.ads_page.index', compact('ads', 'ad'));  
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

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('ad_images'), $imageName);

        $ad = new Ad();
        $ad->title = $request->title;
        $ad->description = $request->description;
        $ad->image = $imageName;
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $ad = Ad::find($id);
        $ad->title = $request->title;
        $ad->description = $request->description;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('ad_images'), $imageName);
            $ad->image = $imageName;
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


    public function updateSecondaryImage(Request $request, $id)
    {
        $request->validate([
            'secondary_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $secondaryImageName = time() . '_secondary.' . $request->secondary_image->getClientOriginalExtension();
        $request->secondary_image->move(public_path('ad_images'), $secondaryImageName);

        $adsec = Ad::updateOrCreate(
            ['id' => $id],
            ['secondary_image' => $secondaryImageName]
        );

        $adsec->save();

        return redirect()->route('ad.index')->with('success', 'Secondary image uploaded successfully');
    }

}
