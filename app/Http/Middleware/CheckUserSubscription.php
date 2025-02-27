<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        // Only check subscription if the user has the "user" role.
        if ($user && $user->hasRole('user')) {
            // List the subscription names used in your application.
            $subscriptionNames = [
                'LIFETIME',
                'ANNUAL MEMBERSHIP',
                '90-DAY MEMBERSHIP',
                'MONTHLY MEMBERSHIP',
            ];

            $hasActiveSubscription = false;

            // Check if the user has any active subscription.
            foreach ($subscriptionNames as $subscriptionName) {
                if ($user->subscribed($subscriptionName)) {
                    $hasActiveSubscription = true;
                    break;
                }
            }

            if ($hasActiveSubscription) {
                // If no active subscription is found, redirect to the plans page.
                return redirect()->route('plans')->with('error', 'You need an active subscription to access this page.');
            }
        }

        return $next($request);
    }
}
