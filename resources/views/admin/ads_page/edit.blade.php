@extends('admin.layout.master')
@section('content')
    <div class="container">
        <h1>Ads Uploads</h1>

        <form action="{{ route('ad.update', $ad->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="name" value="{{ $ad->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" rows="4"  required>{{ $ad->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Images</label>
                <input type="file" name="image" class="form-control" id="images" value="{{ $ad->title }}" accept="image/*">
                <small class="form-text text-muted">You must upload at least 1 image.</small>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
