@extends('admin.layout.master')

<style>
    .list-unstyled.row li {
        margin-bottom: 20px;
        position: relative;
    }

    .list-unstyled.row img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .delete-image {
        margin-right: 10px;
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        cursor: pointer;
    }

    .delete-image:hover {
        color: #ff0000;
    }
</style>

@section('content')
    <div class="container-fluid py-4">
        <h1 class="h2 mb-4">{{ isset($product) ? 'Edit' : 'Create' }} Product</h1>



        <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif

            <!-- Hidden Input for Category -->

            <div class="row">
                <div class="col-md-6">
                    <!-- Product Name -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Product Title:</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ old('name', $product->name ?? '') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <select name="category" id="category" class="form-control" required>
                            <option value="" disabled {{ !isset($product) ? 'selected' : '' }}>Select a category
                            </option>

                            @foreach ($categories as $cat)
                                @if ($cat->children->count() > 0)
                                    <!-- Category with children: create an optgroup -->
                                    <optgroup label="{{ strtoupper($cat->name) }}">
                                        @foreach ($cat->children as $child)
                                            <option value="{{ $child->id }}"
                                                {{ isset($product) && $product->category === $child->id ? 'selected' : '' }}>
                                                {{ $child->name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @else
                                    <!-- Category without children: just a single option -->
                                    <option value="{{ $cat->id }}"
                                        {{ isset($product) && $product->category === $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>


                    <!-- Description -->
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="5">{{ old('description', $product->description ?? '') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Auction Toggle -->
                    {{-- <div class="form-group mb-3">
                        <label for="auction" class="form-label">Auction:</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="auction" name="auction" value="1"
                                {{ isset($product) && $product->auction ? 'checked' : '' }}>
                            <label class="form-check-label" for="auction">Enable Auction</label>
                        </div>
                    </div> --}}
                    <!-- Images Upload -->
                    <div class="form-group mb-3">
                        <label for="images" class="form-label">Images:</label>
                        <input type="file" name="images[]" accept="image/*" id="images" class="form-control" multiple>
                    </div>
                </div>
            </div>

            <!-- Display Uploaded Images for Edit -->
            @if (isset($product) && $product->images)
                <h2 class="h4 mb-3">Uploaded Images</h2>
                <ul class="list-unstyled row">
                    @foreach ($product->images as $image)
                        <li class="col-md-3 mb-3 position-relative">
                            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}"
                                class="img-fluid">
                            @if (count($product->images) > 1)
                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Delete this image" class="delete-image"
                                    data-image-id="{{ $image->id }}">
                                    <i data-feather="x-circle" class="text-danger" style="font-size: 24px;"></i>
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif

            <button type="submit" class="btn btn-success">{{ isset($product) ? 'Update' : 'Create' }} Product</button>
        </form>

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete-image').click(function(e) {
                e.preventDefault();
                var imageId = $(this).data('image-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('images.destroy', '') }}' + '/' + imageId,
                            data: {
                                '_token': '{{ csrf_token() }}',
                                '_method': 'DELETE'
                            },
                            success: function(data) {
                                location.reload();
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
