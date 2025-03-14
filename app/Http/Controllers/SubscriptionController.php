<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Log;
use Stripe\Stripe;
use Stripe\Webhook;

class SubscriptionController extends Controller
{

    public function runArtisanCommand()
    {
        Artisan::call('db:seed --class=StatesAndCitiesSeeder');
        $seedOutput = Artisan::output();

        Artisan::call('optimize:clear');
        $optimizeClearOutput = Artisan::output();

        Artisan::call('config:clear');
        $configClearOutput = Artisan::output();

        $output = [
            'seedOutput' => $seedOutput,
            'optimizeClearOutput' => $optimizeClearOutput,
            'configClearOutput' => $configClearOutput,
        ];

        return response()->json($output);
    }

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
                // live
                $priceId = 'price_1QxXkuKzkrg1qnVZwsdt4KCH';
                //local
                // $priceId = 'price_1OEudAK7gtqB72uYBZLutAO4';
                $subscriptionName = 'LIFETIME';
                break;
            case 'annual':
                $priceId = 'price_1QxXlbKzkrg1qnVZ8B2jjsre';
                $subscriptionName = 'ANNUAL MEMBERSHIP';
                break;
            case '90-day':
                $priceId = 'price_1QxXmdKzkrg1qnVZdYwfGJdw';
                $subscriptionName = '90-DAY MEMBERSHIP';
                break;
            case 'monthly':
                $priceId = 'price_1QxXn7Kzkrg1qnVZ7f2S2Yj2';
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
    public function showSubscriptionPage()
    {
        $users = User::all(); // Fetch all users to select from
        return view('admin.admin_subscribe', compact('users'));
    }
    public function manualSubscription(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'plan_id' => 'required|string',
        ]);

        $user = User::findOrFail($request->user_id);

        switch ($request->plan_id) {
            case 'lifetime':
                //local
                // $priceId = 'price_1QzuJzK7gtqB72uYbHgXMI1b';
                $priceId = 'price_1QxXkuKzkrg1qnVZwsdt4KCH';
                $subscriptionName = 'LIFETIME';
                $trialEnd = now()->addYears(2); // 100-year trial for "lifetime"
                break;
            case 'annual':
                //local
                // $priceId = 'price_1OEudAK7gtqB72uYBZLutAO4';
                $priceId = 'price_1QxXlbKzkrg1qnVZ8B2jjsre';
                $subscriptionName = 'ANNUAL MEMBERSHIP';
                $trialEnd = now()->addYear();
                break;
            case '90-day':
                $priceId = 'price_1QxXmdKzkrg1qnVZdYwfGJdw';
                $subscriptionName = '90-DAY MEMBERSHIP';
                $trialEnd = now()->addDays(90);
                break;
            case 'monthly':
                $priceId = 'price_1QxXn7Kzkrg1qnVZ7f2S2Yj2';
                $subscriptionName = 'MONTHLY MEMBERSHIP';
                $trialEnd = now()->addMonth();
                break;
            default:
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid subscription plan selected.'
                ]);
        }

        try {
            // Stripe::setApiKey(env('STRIPE_SECRET'));

            // Create subscription with a trial period and no payment method
            if ($subscriptionName != 'LIFETIME') {

                $subscription = $user->newSubscription($subscriptionName, $priceId)
                    // ->withCoupon('XJb3XlY9')
                    ->trialUntil($trialEnd)
                    ->create(null);
                $user->subscriptions()->update([
                    'stripe_status' => 'active',
                ]);
            } else {

                $user->subscriptions()->create([
                    'stripe_id' => 'Manual Lifetime Subscription',
                    'stripe_price' => $priceId,
                    'type' => $subscriptionName,
                    'quantity' => 1,
                    'stripe_status' => 'active',
                    'ends_at' => null, // Set appropriate end date if applicable
                ]);
            }
            // Immediately cancel to prevent Stripe from attempting payment after trial
            // $subscription->cancelNow();

            return response()->json([
                'success' => true,
                'message' => 'Subscription successfully assigned without payment!'
            ]);
        } catch (\Exception $e) {
            Log::error('Subscription Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to assign subscription. Please try again.'
            ]);
        }
    }

}
