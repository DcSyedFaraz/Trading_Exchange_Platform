@extends('admin.layout.master')
@section('content')
    <div class="productsec">
        <div class="container">
            <div class="row align-items-center">
                <h2 class="sub-head">Products Pages</h2>
                <div class="products">
                    @foreach ($products as $product)
                        <div class="product">
                            @if (count($product->images) > 0)
                                <img class="Imgofproduct" src="{{ asset('storage/' . $product->images->first()->path) }}"
                                    alt="{{ $product->name }}">
                            @endif

                            <h5>{{ $product->name }}</h5>
                            <div class="btns">
                                <a href="{{ route('products.show', $product->id) }}" class="vd">View Details</a>
                                <a href="#" class="cn">Chat Now</a>
                                <i class="fa-light fa-plus"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
