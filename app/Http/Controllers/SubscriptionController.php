<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Log;
use Stripe\Stripe;
use Stripe\Webhook;

class SubscriptionController extends Controller
{

    public function plans()
    {
        $activeProducts = Product::active()->get();
        $categories = Category::whereNull('parent_id')->with('children')->get();

        $user = Auth::user();
        if (!$user) {
            $intent = null;
        } else {
            $intent = auth()->user()->createSetupIntent();
        }

        return view('frontend.marketplace.plans', [
            'products' => $activeProducts,
            'categories' => $categories,
            'intent' => $intent,
        ]);
    }
    public function planssubscription(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to proceed.');
        }

        $intent = auth()->user()->createSetupIntent();

        return view("frontend.marketplace.plans", compact("plan", "intent"));
    }


    public function handleStripeWebhook(Request $request)
    {
        // Set your Stripe secret key (or use environment variable)
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        // Retrieve the raw body of the webhook request
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        try {
            // Verify the webhook signature
            $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            Log::error('Webhook Error: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            Log::error('Webhook Error: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        // Handle the event based on its type
        switch ($event->type) {
            case 'invoice.payment_failed':
                $this->handlePaymentFailed($event);
                break;

            case 'invoice.payment_succeeded':
                $this->handlePaymentSucceeded($event);
                break;
            // You can add more cases as needed to handle other Stripe events
            default:
                Log::info('Unhandled event type: ' . $event->type);
        }

        // Return a response to acknowledge receipt of the event
        return response()->json(['status' => 'success']);
    }

    protected function handlePaymentSucceeded($event)
    {
        // Extract the relevant information from the event
        $invoice = $event->data->object;
        $userId = $invoice->customer;

        // Find the user by Stripe customer ID
        $user = User::where('stripe_id', $userId)->first();

        if ($user) {

            Log::info("Subscription activated after successful payment for user {$user->id}");
        }
    }
    protected function handlePaymentFailed($event)
    {
        // Extract the relevant information from the event
        Log::info("Got event $event");
        $invoice = $event->data->object;
        $userId = $invoice->customer;

        // Find the user by Stripe customer ID
        $user = User::where('stripe_id', $userId)->first();

        if ($user) {
            // Cancel or deactivate the subscription as the payment failed
            if ($user->subscription('default')->onTrial()) {
                $user->subscription('default')->endTrial();
            }

            if ($user->subscribed('default')) {
                // Mark the subscription as canceled or expired (or whatever action you want)
                $user->subscription('default')->cancelNow();

                // Optionally, notify the user or take other actions
                Log::info('Subscription canceled due to failed payment for user ' . $user->id);
            }
        }
    }


    public function planssuccess(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'plan_id' => 'required|string',
            'token' => 'required|string',
            'name' => 'required|string|max:255',
        ]);

        // Map plan identifiers to Stripe price IDs
        switch ($request->plan_id) {
            case 'lifetime':
                $priceId = 'price_1QknTiQSj1fwAKJyRqfFoZZR'; // Replace with your actual Stripe price ID
                $subscriptionName = 'LIFETIME';
                break;
            case 'annual':
                $priceId = 'price_1QknUxQSj1fwAKJyiummwrtf'; // Replace with your actual Stripe price ID
                $subscriptionName = 'ANNUAL MEMBERSHIP';
                break;
            case '90-day':
                $priceId = 'price_1QknVPQSj1fwAKJy92OObiuL'; // Replace with your actual Stripe price ID
                $subscriptionName = '90-DAY MEMBERSHIP';
                break;
            case 'monthly':
                $priceId = 'price_1QknVgQSj1fwAKJyusCrHbZu'; // Replace with your actual Stripe price ID
                $subscriptionName = 'MONTHLY MEMBERSHIP';
                break;
            default:
                return redirect()->route('plans')->with('error', 'Invalid subscription plan selected.');
        }

        try {
            // Create the subscription
            $subscription = $request->user()
                ->newSubscription($subscriptionName, $priceId)->trialDays(7)
                ->create($request->token);

            return redirect()->route('plans')
                ->with('success', 'Subscription purchased successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Subscription Error: ' . $e->getMessage());

            return redirect()->route('plans')
                ->with('error', 'There was an issue with your subscription.');
        }
    }

}
