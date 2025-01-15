@extends('admin.layout.master')
@section('title', 'View Bids')

@section('content')
    <div class="container">
        <h1>Placed Bids</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>User</th>
                    <th>Bid Amount</th>
                    <th>Highest Bid</th>
                    <th>Bid Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product->bids as $key => $bid)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $bid->user->name }} ({{ $bid->user->email }})</td>
                        <td>${{ number_format($bid->amount, 2) }}</td>
                        <td>
                            @if ($key == 0)
                                <span class="badge bg-success">Highest Bid</span>
                            @endif
                        </td>
                        <td>{{ $bid->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($product->bids->isEmpty())
            <p>No bids placed yet.</p>
        @endif
    </div>
@endsection
