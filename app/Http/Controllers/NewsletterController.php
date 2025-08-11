<?php

namespace App\Http\Controllers;

use App\Jobs\SendConfirmationEmail;
use App\Models\Subscriber;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Throwable;

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

        try {
            $existingSubscriber = Subscriber::where('email', $request->email)->first();

            if ($existingSubscriber) {
                return redirect()->back()->with('error', 'You are already subscribed to our newsletter.');
            }

            $token = str()->random(40);
            $subscriber = Subscriber::firstOrCreate(
                ['email' => $request->email],
                ['confirm_token' => $token]
            );

            SendConfirmationEmail::dispatch($subscriber->email, $subscriber->confirm_token);

            return redirect()->back()->with('success', 'Please check your email to confirm subscription.');
        } catch (QueryException $e) {
            // Unique/email constraint or other DB issue
            if ($e->getCode() === '23000') {
                return redirect()->back()->with('error', 'You are already subscribed to our newsletter.');
            }
            report($e);
            return redirect()->back()->with('error', 'We couldn’t process your request right now. Please try again shortly.');
        } catch (Throwable $e) {
            report($e);
            return redirect()->back()->with('error', 'Something went wrong while sending the confirmation email. Please try again later.');
        }
    }

    public function confirm($token)
    {
        $subscriber = Subscriber::where('confirm_token', $token)->firstOrFail();
        $subscriber->update(['confirm_token' => null, 'confirmed_at' => now()]);

        return view('newsletter.confirmed');
    }
}
