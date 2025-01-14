@extends('admin.layout.master')
@section('content')
    <div class="container">
        <h1>Ads Uploads</h1>

        <form action="{{ route('ad.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Images</label>
                <input type="file" name="image" class="form-control" id="images" required>
                <small class="form-text text-muted">You must upload at least 1 image.</small>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
