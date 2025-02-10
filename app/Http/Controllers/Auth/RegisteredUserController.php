<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFile;
use App\Notifications\DynamicNotification;
use App\Notifications\NewUserNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Notification;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'file.*' => ['required', 'file', 'mimes:pdf'],
        ]);


        $user = User::create([
            'address' => $request->address,
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('user');
        event(new Registered($user));

        Auth::login($user);
        // **File Upload (Save in user_files Table)**
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


        // **User Table ke `path` Column mein Save karna**
        $admins = User::role('admin')->get();

        $message = "A new user, {$user->name}, has registered.";
        $url = route('users.edit', ['user' => $user->id]); // Adjust the route to your user details page.

        Notification::send($admins, new DynamicNotification($message, $url));


        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
