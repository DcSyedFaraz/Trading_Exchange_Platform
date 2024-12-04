<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManageController extends Controller
{
    public function index(){
        $users = User::all();
        return view("admin.user_management", compact('users'));
    }
}
