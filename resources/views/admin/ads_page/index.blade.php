@extends('admin.layout.master')
@section('content')
    <div class="adssec">
        <div class="container">
            <div class="row align-items-center">

                <h2 class="sub-head">Ads Upload</h2>

                <form action="{{ route('ad.updateSecondaryImage', $ad->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="imageupload mb-5">
                        <div class="row align-items-center">

                            <div class="col-4">
                                <input type="file" name="secondary_image">
                            </div>

                            <div class="col-4">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="table">
                    <table>
                        <thead>
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
                            @foreach ($ads as $ad)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $ad->title }}</td>
                                    <td>{{ $ad->description }}</td>
                                    <td>

                                        <img class="Imgofproduct" src="{{ asset('ad_images/' . $ad->image) }}"
                                            alt="{{ $ad->image }}">
                                    </td>

                                    <td>
                                        {{-- <a href="{{ route('ad.show', $ad->id) }}" class="aprv">View</a> --}}
                                        <a href="{{ route('ad.edit', $ad->id) }}" class="aprv">Edit</a>
                                        <form action="{{ route('ad.destroy', $ad->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dec">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('ad.create') }}" class="addprod">
                        Ads Upload
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
