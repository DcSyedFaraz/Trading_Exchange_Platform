@extends('frontend.marketplace.layout.app')
@section('content')
    <section class="barter-1">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('frontend.layout.categories')

                </div>
                <div class="col-md-9">
                    @if ($products->count())
                        <h2>Search Results</h2>
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <!-- Assuming you have a product image -->
                                        @if (count($product->images) > 0)
                                            <img src="{{ asset('storage/' . $product->images->first()->path) }}"
                                                class="card-img-top" @endif
                                            alt="{{ $product->name }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $product->name }}</h5>
                                                <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                                                <a href="{{ route('marketplace.details', $product->id) }}"
                                                    class="btn btn-primary">View Product</a>
                                            </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination Links -->
                        {{ $products->links() }}
                    @else
                        <p>No products found matching your criteria.</p>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
