@extends('admin.layout.master')
@section('content')
    <div class="container">
        <h1>Edit Auction Product</h1>

        <form action="{{ route('auction_products.update', $auctionProduct) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $auctionProduct->name }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="4" required>{{ $auctionProduct->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <select name="state" id="state" class="form-control" onchange="populateCities('state', 'province')"
                    required>
                    <option value="{{ $auctionProduct->state }}" selected hidden>{{ $auctionProduct->state }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="province" class="form-label">City</label>
                <select name="province" id="province" class="form-control" required>
                    <option value="{{ $auctionProduct->province }}" selected hidden>{{ $auctionProduct->province }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="minimum_bid" class="form-label">Minimum Bid</label>
                <input type="number" name="minimum_bid" class="form-control" id="minimum_bid"
                    value="{{ $auctionProduct->minimum_bid }}" required>
            </div>

            <div class="mb-3">
                <label for="auction_end_time" class="form-label">Auction End Time</label>
                <input type="datetime-local" name="auction_end_time" class="form-control" id="auction_end_time"
                    value="{{ $auctionProduct->auction_end_time->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Product Images</label>
                <input type="file" name="images[]" class="form-control" id="images" multiple>
                <small class="form-text text-muted">Leave blank if you don't want to update images. Upload multiple
                    images.</small>

                <div class="mt-3">
                    <h5>Uploaded Images</h5>
                    @if ($auctionProduct->images->isNotEmpty())
                        <div class="row">
                            @foreach ($auctionProduct->images as $image)
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image"
                                        class="img-thumbnail mb-2" style="max-width: 100%; height: auto;">
                                    <form
                                        action="{{ route('admin.auction_products.images.destroy', ['auctionProduct' => $auctionProduct->id, 'image' => $image->id]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this image?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>No images uploaded yet.</p>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

@endsection
@section('scripts')
    <script>
        // Initialize the state and city dropdowns
        // populateStates("state", "province");
    </script>
@endsection
