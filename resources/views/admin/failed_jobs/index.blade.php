@extends('admin.layout.master')
@section('content')

<div id="app-layout">
    <div class="content-page">
        <div class="content">
            <div class="container-xxl">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="fs-18 fw-semibold m-0">Failed Jobs</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Connection</th>
                                    <th>Queue</th>
                                    <th>Failed At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($failedJobs as $job)
                                    <tr>
                                        <td>{{ $job->id }}</td>
                                        <td>{{ $job->connection }}</td>
                                        <td>{{ $job->queue }}</td>
                                        <td>{{ $job->failed_at }}</td>
                                        <td class="d-flex gap-2">
                                            <form action="{{ route('failed-jobs.retry', $job->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">Retry</button>
                                            </form>
                                            <form action="{{ route('failed-jobs.destroy', $job->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No failed jobs found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

