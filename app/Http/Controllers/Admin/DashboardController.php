<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class DashboardController extends Controller
{
    public function index(){
        return view("admin/dashboards");
    }


    public function logout()
    {
        Auth::logout(); // Log out the user
        Session::flash('message', 'You have been successfully logged out.'); // Set flash message

        return redirect()->route('login'); // Redirect to a specific route (e.g., home page)
    }
}


