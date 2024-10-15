@extends('frontend.marketplace.layout.app')
@section('content')
    <section class="barter-1">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('frontend.layout.categories')

                </div>
                <div class="col-md-9">
                    @forelse ($products as $product)
                        <div class="col-4">

                            <div class="imgbox">
                                @if ($product->images->isNotEmpty() && $product->images->first()->path)
                                    <img src="{{ asset('storage/' . $product->images->first()->path) }}"
                                        class="imbox-img product-img" />
                                @else
                                    <img src="{{ asset('assets/images/no_product.svg') }}" class="imbox-img product-img" />
                                @endif
                                <a href="#" class="imgbox-b">
                                    <h4>{{ $product->name }}</h4>
                                </a>
                                <p>{{ $product->description }}</p>
                                <div class="Btndiv">
                                    <a href="{{ route('marketplace.details', $product->id) }}" class="Firstbtn">View
                                        Details</a>
                                    <a href="{{ route('products.chat', $product->id) }}" class="Secbtn">Chat Now</a>
                                </div>
                            </div>
                        </div>

                    @empty
                        <p class="text-center">
                            No products found in this category.
                        </p>
                    @endforelse
                </div>

            </div>
        </div>
    </section>
@endsection
