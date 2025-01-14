<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class EditProfileController extends Controller
{
    public function index()
    {
        $user = User::first();
        return view('admin.edit_profile', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.edit_profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'oldpass' => 'nullable|string',
            'newpass' => 'nullable|string|min:8',
            'country' => 'nullable',
            'city' => 'nullable',
            'province' => 'nullable',
            'address' => 'nullable',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->oldpass, $user->password)) {
            return redirect()->back()->with('error', 'Old password is incorrect.');
        }

        $user->password = Hash::make($request->newpass);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('edit_profile.index')->with('success', 'Profile updated successfully');
    }
    public function markAllRead()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        return redirect()->back()->with('success', 'All notifications marked as read.');
    }

}
