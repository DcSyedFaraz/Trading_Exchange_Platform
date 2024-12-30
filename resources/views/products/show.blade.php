@extends('admin.layout.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex align-items-center">

            <h1 class="mb-4 me-2">{{ $product->name }}</h1>
            @if ($product->feature)
                <span class="badge bg-success">Featured</span>
            @endif

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <p class="card-text">Description: {{ $product->description }}</p>
                        <p class="card-text">Status: {{ $product->is_active ? 'Active' : 'Inactive' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="h4 mb-3">Images</h2>
                <div class="row">
                    @foreach ($product->images as $image)
                        <div class="col-md-4 mb-3">
                            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}" class="img-fluid">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
    </div>
@endsection

@push('styles')
    <style>
        .card {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card-text {
            margin-bottom: 10px;
        }
    </style>
@endpush
