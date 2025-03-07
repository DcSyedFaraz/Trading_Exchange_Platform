@extends('admin.layout.master')

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
                            @if ($user->userFiles->isNotEmpty())
                                <h6>Uploaded PDFs:</h6>
                                <ul class="list-unstyled">
                                    @foreach ($user->userFiles as $file)
                                        <li>
                                            <a href="{{ asset('storage/' . $file->path) }}" target="_blank">
                                                <i class="fas fa-file-pdf text-danger"></i>
                                                {{ Str::limit(basename($file->path), 20) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted">No files uploaded yet.</p>
                            @endif
                            <form method="post" action="{{ route('update-files', $user->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <strong>Upload New PDFs:</strong>
                                    <input type="file" name="file[]" class="form-control my-2" multiple
                                        accept="application/pdf">
                                </div>
                                <button type="submit" class="btn btn-primary">Update PDFs</button>
                            </form>

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
                            <p class="text-black">
                                Status:
                                <span
                                    class="badge {{ $subscription->stripe_status === 'active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($subscription->stripe_status) }}
                                </span>
                            </p>

                            @if ($subscription->type !== 'LIFETIME')
                                @php
                                    $activeSubscription = $user->subscriptions()->active()->first();
                                @endphp


                                @if ($activeSubscription)
                                    <p class="text-black"><strong>Next Billing Date:</strong>
                                        {{ \Carbon\Carbon::createFromTimestamp($activeSubscription->asStripeSubscription()->current_period_end)->format('F d, Y') }}
                                    </p>
                                @else
                                    <p>No active subscription found.</p>
                                @endif
                            @endif
                        @else
                            <p class="text-black">You are not subscribed to any package.</p>
                            <a href="{{ route('plans') }}" class="btn btn-primary">Subscribe Now</a>
                        @endif
                    </div>
                </div>
            </div>

        </div> <!-- container-xxl -->

    </div> <!-- content -->
@endsection
