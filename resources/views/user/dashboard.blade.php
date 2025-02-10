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

/* PDF Container Styling */
.pdf-thumbnail {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
}

.pdf-thumbnail embed {
    border-radius: 8px;
    transition: transform 0.3s ease-in-out;
}

/* Hover Effect on PDF Thumbnails */
.pdf-thumbnail:hover embed {
    transform: scale(1.05);
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
}

/* File Name Text Truncate */
.text-truncate {
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* PDF Modal */
.modal-content {
    border-radius: 10px;
}

/* Button Close Styling */
.btn-close {
    background: none;
    border: none;
}

/* Responsive Styling */
@media (max-width: 768px) {
    .pdf-thumbnail embed {
        height: 140px;
    }
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
                                                    <h6 class="text-center text-primary fw-bold text-truncate" title="{{ basename($file->path) }}">
                                                        {{ basename($file->path) }}
                                                    </h6>
                                                    <div class="pdf-thumbnail text-center">
                                                        <a href="{{ asset('storage/' . $file->path) }}" >
                                                            <div class="pdf-container">
                                                                <embed src="{{ asset('storage/' . $file->path) }}" class="img-thumbnail rounded shadow-sm" width="100%" height="180px" />
                                                            </div>
                                                        </a>
                                                    </div>
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
<!-- PDF Modal -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pdfModalLabel">PDF Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <iframe id="pdfViewer" src="" width="100%" height="500px"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Modal -->
<script>
    function openPdfModal(pdfUrl) {
        document.getElementById('pdfViewer').src = pdfUrl;
        var pdfModal = new bootstrap.Modal(document.getElementById('pdfModal'));
        pdfModal.show();
    }
</script>
@endsection
