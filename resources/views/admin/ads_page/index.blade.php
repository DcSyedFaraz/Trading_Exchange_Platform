@extends('admin.layout.master')
@section('content')
    <div class="adssec">
        <div class="container">
            <div class="row align-items-center">

                <h2 class="sub-head text-center mb-4">Ads Upload</h2>

                <form action="{{ route('ad.updateSecondaryImage') }}" method="POST" enctype="multipart/form-data"
                    class="mb-5">
                    @csrf
                    @method('PUT')
                    <div class="imageupload mb-5">
                        <div class="row align-items-center">

                            <div class="col-md-6 mb-3">
                                <label for="secondary_image" class="form-label">Upload Secondary Image:</label>
                                <input type="file" name="secondary_image" id="secondary_image" class="form-control">
                            </div>

                            <div class="col-md-6 text-center">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                        @if ($previousSecondaryImage)
                            <div class="text-center mt-4">
                                <h5>Previously Uploaded Secondary Image:</h5>
                                <img src="{{ asset('storage/' . $previousSecondaryImage->image) }}" alt="Secondary Image"
                                    class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        @endif
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $id = 1;
                            @endphp
                            @forelse ($ads as $ad)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $ad->title }}</td>
                                    <td>{{ $ad->description }}</td>
                                    <td>
                                        <img class="Imgofproduct img-thumbnail" src="{{ asset('storage/' . $ad->image) }}"
                                            alt="{{ $ad->image }}" style="max-width: 100px;">
                                    </td>

                                    <td>
                                        <a href="{{ route('ad.edit', $ad->id) }}"
                                            class="btn btn-success btn-sm mb-1">Edit</a>
                                        <form action="{{ route('ad.destroy', $ad->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No ads available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="text-center">
                        <a href="{{ route('ad.create') }}" class="btn btn-primary mt-3">Add New Ad</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
