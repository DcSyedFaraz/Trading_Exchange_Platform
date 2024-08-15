@extends('admin.layout.master')

@section('content')
    <div class="container-fluid py-4">
        <h1 class="h2 mb-4">Create Product</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="sku" class="form-label">SKU:</label>
                        <input type="text" name="sku" id="sku" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" step="0.01" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="auction" class="form-label">Auction:</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="auction" name="auction" value="1">
                            <label class="form-check-label" for="auction">Enable Auction</label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="images" class="form-label">Images:</label>
                        <input type="file" name="images[]" accept="image/*" id="images" class="form-control" multiple>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="uploaded-images" class="uploaded-images">
                        @if (isset($images))
                            @foreach ($images as $image)
                                <div class="uploaded-image">
                                    <img src="{{ asset('storage/' . $image) }}" alt="Uploaded Image" class="img-fluid">
                                    <a href="#" class="delete-image" data-image="{{ $image }}">
                                        <i data-feather="x-circle" class="text-danger" style="font-size: 24px;"></i>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Create Product</button>
        </form>
    </div>
@endsection

@push('styles')
    <style>
        .uploaded-images {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .uploaded-image {
            position: relative;
            width: 150px;
            height: 150px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
        }

        .uploaded-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .delete-image {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: #fff;
            background-color: #dc3545;
            padding: 5px 10px;
            border-radius: 50%;
            cursor: pointer;
        }

        .delete-image:hover {
            background-color: #c82333;
        }
    </style>
@endpush
