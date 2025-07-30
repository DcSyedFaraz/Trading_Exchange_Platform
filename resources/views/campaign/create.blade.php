@extends('admin.layout.master')

@section('content')
    <div class="container ">
        <div class="card mx-auto shadow-lg" style="max-width: 600px;">
            <div class="card-header text-center bg-primary text-white">
                <h2 class="my-2">Create New Campaign</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('campaign.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control"
                            placeholder="Enter campaign subject" required>
                    </div>

                    <div class="mb-4">
                        <label for="body" class="form-label">Body</label>
                        <textarea id="body" name="body" rows="6" class="form-control"
                            placeholder="Write your campaign message here" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="send_at" class="form-label">Schedule (optional)</label>
                        <input type="datetime-local" id="send_at" name="send_at" class="form-control">
                    </div>

                    <div class="d-grid">
                        <button type="submit" name="send_now" value="1" class="btn btn-primary btn-lg custom-btn">
                            Send Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Custom overrides */
        .custom-btn {
            border-radius: 0.5rem;
        }
    </style>
@endpush
