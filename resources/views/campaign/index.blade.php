@extends('admin.layout.master')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Campaigns</h2>
            <a href="{{ route('campaign.create') }}" class="btn btn-primary">New Campaign</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campaigns as $campaign)
                            <tr>
                                <td>{{ $campaign->subject }}</td>
                                <td>{{ ucfirst($campaign->status) }}</td>
                                <td>
                                    @if ($campaign->status !== 'sent')
                                        <form method="POST" action="{{ route('campaign.send', $campaign) }}"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                                Send Now
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-secondary">—</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            {{ $campaigns->links() }}
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Custom table overrides */
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>
@endpush
