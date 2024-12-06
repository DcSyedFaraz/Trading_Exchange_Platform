@extends('admin.layout.master')
@section('content')
    <div class="container">
        <h1>Create Auction Product</h1>

        <form action="{{ route('auction_products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <select name="state" id="state" class="form-control" onchange="populateCities('state', 'province')"
                    required>
                    <option value="">Select State</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="province" class="form-label">City</label>
                <select name="province" id="province" class="form-control" required>
                    <option value="">Select City</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="minimum_bid" class="form-label">Minimum Bid</label>
                <input type="number" name="minimum_bid" class="form-control" id="minimum_bid" required>
            </div>

            <div class="mb-3">
                <label for="auction_end_time" class="form-label">Auction End Time</label>
                <input type="datetime-local" name="auction_end_time" class="form-control" id="auction_end_time" required>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Product Images</label>
                <input type="file" name="images[]" class="form-control" id="images" multiple required>
                <small class="form-text text-muted">You must upload at least 1 image.</small>
            </div>

            <button type="submit" class="btn btn-primary">Save Product</button>
        </form>
    </div>

    <script>
        // Initialize the state and city dropdowns
        populateStates("state", "province");
    </script>
@endsection
