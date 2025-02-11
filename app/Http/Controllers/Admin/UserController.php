<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFile;
use App\Notifications\NewUserNotification;
use Arr;
use Auth;
use Config;
use DB;
use Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::get();
        return view('admin.users.index', $data);
    }
    public function user()
    {
        $user = Auth::user();
        $subscription = $user->subscription('default'); // Replace 'default' if using a different subscription name

        $package = null;

        if ($subscription && $subscription->active()) {
            $plans = Config::get('subscriptions.plans');
            foreach ($plans as $plan) {
                if ($plan['id'] === $subscription->stripe_price) { // stripe_price holds the Stripe Price ID
                    $package = $plan;
                    break;
                }
            }
        }
        return view('user.dashboard', compact('user'));
    }

    public function create()
    {
        $roles = Role::select(['id', 'name'])->get();
        return view('admin.users.create', compact('roles'));
    }

    //User Store
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
                'roles' => 'required',
            ]);

            $input = $request->all();
            $input['password'] = Hash::make($input['password']);

            $users = User::create($input);
            // dd($request->input('roles'));
            $roles = $request->input('roles');

            if (is_array($roles)) {
                $users->assignRole($roles);
            } else {
                $users->assignRole([$roles]);
            }


            // $users->notify(new NewUserNotification($users));

            DB::commit();
            return redirect()->route('users.index')
                ->with('success', 'User Create successfully');

        } catch (\Exception $e) {
            DB::rollback();
            // throw $e;
            return redirect()->back()->with('error', 'An error occurred while creating the checklist. Please try again or contact support for assistance.');
        }
    }

    //User Show
    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = $user->getRoleNames(); // Check if roles are retrieved correctly

        return view('users.show', compact('user', 'roles'));
    }

    public function edit($id)
    {
        // dd($id);
        $user = User::find($id);
        $roles = Role::select('id', 'name')->get();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $user->load('userFiles');
        return view('admin.users.edit', compact('user', 'roles', 'userRole','userRole'));
    }

    //User Update
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => "required|email|unique:users,email,$id",
            'password' => 'nullable| same:confirm-password',
            'roles' => 'required',
            'file.*' => 'mimes:pdf|max:2048',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, ['password']);
        }

        $user = User::find($id);
        $user->update($input);

        $user->syncRoles($request->roles);
         // Check if files are uploaded
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs("users", $fileName, 'public');

                UserFile::create([
                    'user_id' => $user->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function updateFiles(Request $request, User $user)
    {
        $request->validate([
            'file.*' => 'mimes:pdf|max:2048', // Multiple PDF files
        ]);

        // Purani files delete na ho, sirf nayi add ho
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs("users", $fileName, 'public');

                UserFile::create([
                    'user_id' => $user->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->back()->with('success', 'User PDFs updated successfully.');
    }
}
