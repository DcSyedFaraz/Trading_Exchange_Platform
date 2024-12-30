@extends('admin.layout.master')

@section('content')
    <div class="adssec">
        <div class="container">
            <div class="row align-items-center">
                <h2 class="sub-head">Our Featured Products</h2>
                <div class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Product Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($featuredProducts as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $product->id) }}" class="aprv">View</a>
                                        <a href="{{ route('products.edit', $product->id) }}" class="dec">Edit</a>
                                        <a href="#" class="dec remove-feature-btn"
                                            data-id="{{ $product->id }}">Remove Feature</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No featured products found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <a href="{{ route('products.create') }}" class="addprod">Add New Product</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const removeFeatureButtons = document.querySelectorAll('.remove-feature-btn');

            removeFeatureButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const productId = this.getAttribute('data-id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to remove this product from featured?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, remove it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Send AJAX request to unfeature the product
                            fetch("{{ route('products.feature') }}", {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        id: productId,
                                        action: 'unfeature'
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire(
                                            'Removed!',
                                            'The product has been removed from featured.',
                                            'success'
                                        ).then(() => {
                                            // Optionally, remove the row from the table without refreshing
                                            // For simplicity, we'll reload the page
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire(
                                            'Error!',
                                            data.message ||
                                            'There was a problem removing the feature.',
                                            'error'
                                        );
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire(
                                        'Error!',
                                        'There was a problem removing the feature.',
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
