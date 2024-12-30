@extends('admin.layout.master')
@section('title', 'Products')
@section('content')
    <div class="productsec">
        <div class="container">
            <h2>Products Pages</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a>
            <div class="row align-items-center my-2">
                <div class="products">
                    @forelse($products as $product)
                        <div class="product">
                            @if ($product->images->count() > 0)
                                <img class="Imgofproduct" src="{{ asset('storage/' . $product->images->first()->path) }}"
                                    alt="{{ $product->name }}">
                            @endif

                            <div class="d-flex align-items-center">

                                <h5 class="me-2">{{ $product->name }}</h5>
                                @if ($product->feature)
                                    <span class="badge bg-success">Featured</span>
                                @endif

                            </div>
                            <div class="btns">
                                <a href="{{ route('products.show', $product->id) }}" class="vd">View Details</a>
                                <a href="{{ route('products.chat', $product->id) }}" class="cn">Chat Now</a>
                                <i class="fa-light fa-plus dropdown-toggle" role="button"
                                    id="dropdownMenuLink{{ $product->id }}" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink{{ $product->id }}">
                                    <li><a class="dropdown-item" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('products.destroy', $product->id) }}"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();">Delete</a>
                                    </li>
                                    <li>
                                        @if ($product->feature)
                                            <a class="dropdown-item feature-btn" href="#"
                                                data-id="{{ $product->id }}" data-action="unfeature">Remove Feature</a>
                                        @else
                                            <a class="dropdown-item feature-btn" href="#"
                                                data-id="{{ $product->id }}" data-action="feature">Feature</a>
                                        @endif
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <!-- Delete Form -->
                        <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    @empty
                        <p>No products available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Include SweetAlert2 JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const featureButtons = document.querySelectorAll('.feature-btn');

            featureButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const productId = this.getAttribute('data-id');
                    const action = this.getAttribute('data-action'); // 'feature' or 'unfeature'

                    let title, text, confirmButtonText;

                    if (action === 'feature') {
                        title = 'Are you sure?';
                        text = "Do you want to feature this product?";
                        confirmButtonText = 'Yes, feature it!';
                    } else {
                        title = 'Are you sure?';
                        text = "Do you want to remove the feature from this product?";
                        confirmButtonText = 'Yes, remove feature!';
                    }

                    Swal.fire({
                        title: title,
                        text: text,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: confirmButtonText
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Send AJAX request to feature/unfeature the product
                            fetch("{{ route('products.feature') }}", {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        id: productId,
                                        action: action
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire(
                                            data.messageTitle,
                                            data.message,
                                            'success'
                                        ).then(() => {
                                            // Optionally, refresh the page or update the UI
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            data.message ||
                                            'There was a problem processing your request.',
                                            'error'
                                        );
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire(
                                        'Error!',
                                        'There was a problem processing your request.',
                                        'error'
                                    );
                                });
                        }
                    });
                });
            });
        });
    </script>
@endsection
