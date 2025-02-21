@extends('admin.layout.master')

@section('content')
    <div class="container">
        <h1>Admin Subscription Management</h1>
        <form action="{{ route('admin.manual_subscription') }}" method="POST" id="manualSubscriptionForm">
            @csrf
            <div class="form-group">
                <label for="user_id">Select User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Select a User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="plan_id">Select Subscription Plan</label>
                <select name="plan_id" id="plan_id" class="form-control" required>
                    <option value="lifetime">Lifetime</option>
                    <option value="annual">Annual Membership</option>
                    <option value="90-day">90-Day Membership</option>
                    <option value="monthly">Monthly Membership</option>
                </select>
            </div>

            {{-- <div class="form-group">
                <label for="admin_token">Admin Token</label>
                <input type="text" name="admin_token" id="admin_token" class="form-control" required>
            </div> --}}

            <button type="submit" class="btn btn-primary">Assign Subscription</button>
        </form>

        <div id="responseMessage" style="margin-top: 20px;"></div>
    </div>

@section('scripts')
    <script>
        // Handling the form submission via AJAX
        document.getElementById('manualSubscriptionForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var form = this;
            var formData = new FormData(form);

            // Disable the submit button to prevent multiple clicks
            var submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;

            // Send the data to the server via AJAX
            fetch("{{ route('admin.manual_subscription') }}", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    submitButton.disabled = false;
                    // Display success or error message
                    var messageDiv = document.getElementById('responseMessage');
                    if (data.success) {
                        messageDiv.innerHTML = '<div class="alert alert-success">' + data.message + '</div>';
                    } else {
                        messageDiv.innerHTML = '<div class="alert alert-danger">' + data.message + '</div>';
                    }
                })
                .catch(error => {
                    submitButton.disabled = false;
                    var messageDiv = document.getElementById('responseMessage');
                    messageDiv.innerHTML =
                        '<div class="alert alert-danger">Something went wrong. Please try again.</div>';
                });
        });
    </script>
@endsection
@endsection
