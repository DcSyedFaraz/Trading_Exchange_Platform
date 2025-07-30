@extends('admin.layout.master')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Campaign Analytics</h2>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Subject</th>
                        <th>Sent</th>
                        <th>Opens</th>
                        <th>Clicks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($campaigns as $campaign)
                        <tr>
                            <td>{{ $campaign->subject }}</td>
                            <td>{{ $campaign->sent_count }}</td>
                            <td>{{ $campaign->open_count }}</td>
                            <td>{{ $campaign->click_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
