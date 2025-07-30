<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function subscribeForm()
    {
        return view('newsletter.subscribe');
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $subscriber = Subscriber::firstOrCreate(
            ['email' => $request->email],
            ['confirm_token' => str()->random(40)]
        );

        Mail::to($subscriber->email)->send(new ConfirmationMail($subscriber->confirm_token));

        return redirect()->back()->with('status', 'Please check your email to confirm subscription.');
    }

    public function confirm($token)
    {
        $subscriber = Subscriber::where('confirm_token', $token)->firstOrFail();
        $subscriber->update(['confirm_token' => null, 'confirmed_at' => now()]);

        return view('newsletter.confirmed');
    }
}
