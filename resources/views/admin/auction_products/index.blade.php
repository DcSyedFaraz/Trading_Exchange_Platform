@extends('admin.layout.master')
@section('title', 'Auction Products')
@section('content')
    <div class="container">
        <h1>Auction Products</h1>
        <a href="{{ route('auction_products.create') }}" class="btn btn-primary">Create New Product</a>
        <p class="premium">Premium Members; 5% for each Premiere Member.  Other Members:  7%. per side.  Guests:  10% per side. Credit card fees, shipping fees, if any, are calculated on Invoice.</p>

        <div class="prod-table">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>State</th>
                        <th>Province</th>
                        <th>Minimum Bid</th>
                        <th>Highest Bid</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->state }}</td>
                            <td>{{ $product->province }}</td>
                            <td>${{ number_format($product->minimum_bid, 2) }}</td>
                            <td>${{ $product->highest_bid ? number_format($product->highest_bid, 2) : 'N/A' }}</td>
                            <td>
                                <span class="badge {{ $product->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $product->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('auction_products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('auction_products.bids', $product) }}" class="btn btn-primary btn-sm">Bids</a>
                                <form action="{{ route('auction_products.destroy', $product) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="">
            {{ $products->links() }}
        </div>
    </div>
@endsection
