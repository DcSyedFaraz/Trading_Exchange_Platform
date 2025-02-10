@extends('admin.layout.master')
<style>
    /* User Profile Card Styling */
.card {
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

/* Title Styling */
h5, h6 {
    font-weight: bold;
}
</style>
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                </div>
            </div>

            <!-- Greeting Section -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card p-3">
                        <h5>
                            Hello, {{ $user->name }}!
                        </h5>
                    </div>
                </div>
            </div>

            <!-- Logos Section -->
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <!-- Replace the src with your logo paths -->
                    <img src="{{ asset('assets/images/BP-Logo.png') }}" alt="Logo 1" class="mx-2" style="width: 100px;">
                </div>
            </div>

            <!-- Profile Section -->
            <div class="row">
                @if ($user->hasRole('admin'))
                    <!-- Admin Profile Card -->
                    <div class="col-md-6">
                        <div class="card p-4">
                            <h5>Admin Profile</h5>
                            <p>Name: {{ $user->name }}</p>
                            <p>Email: {{ $user->email }}</p>
                            <!-- Add more admin-specific details here -->
                        </div>
                    </div>
                @else
                    <!-- User Profile Card -->
                    <div class="col-md-6">
                        <div class="card p-4">
                            <h5>User Profile</h5>
                            <p class="text-black">Name: {{ $user->name }}</p>
                            <p class="text-black">Email: {{ $user->email }}</p>
                            <!-- Add more user-specific details here -->
                            {{-- PDF DISPLAY --}}
                             <!-- PDF Display -->
                            <h5 class="mt-4">Uploaded PDFs</h5>
                            @if($user->userFiles->count())
                                @foreach($user->userFiles->chunk(2) as $chunk)
                                    <div class="row mb-3">
                                        @foreach($chunk as $file)
                                            <div class="col-md-6">
                                                <div class="card p-3 border-0 shadow-sm">
                                                <a href="{{ asset('storage/' . $file->path) }}" target="_blank"><h6 class="text-center text-primary fw-bold text-truncate" title="{{ basename($file->path) }}">
                                                        {{ basename($file->path) }}
                                                    </h6></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted text-center">No PDFs uploaded yet.</p>
                            @endif
                            <!-- End PDF Display -->
                            {{-- End PDF --}}
                        </div>

                    </div>
                @endif

                <!-- Common Profile Information -->
                <div class="col-md-6">
                    <div class="card p-4">
                        <h5>Subscription Package</h5>
                        @if (count($user->subscriptions) > 0)
                            @php
                                $subscription = $user->subscriptions->first();
                            @endphp
                            <p class="text-black">Subscribed to: {{ $subscription->type }}</p>
                            <p class="text-black">Status: {{ $subscription->stripe_status }}</p>
                            <p class="text-black"><strong>Next Billing Date:</strong>
                                {{ \Carbon\Carbon::createFromTimestamp($user->subscription($subscription->type)->asStripeSubscription()->current_period_end)->format('F d, Y') }}
                            </p>
                        @else
                            <p class="text-black">You are not subscribed to any package.</p>
                            <a href="{{ route('plans') }}" class="btn btn-primary">Subscribe Now</a>
                        @endif
                    </div>
                </div>
            </div>



        </div> <!-- container-xxl -->

    </div>

@endsection
