@extends('admin.layout.master')
@section('title', 'Auction Products')
@section('content')
    <div class="container">
        <h1>Auction Products</h1>
        <a href="{{ route('auction_products.create') }}" class="btn btn-primary">Create New Product</a>

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
        <div class="">
            {{ $products->links() }}
        </div>
    </div>
@endsection
