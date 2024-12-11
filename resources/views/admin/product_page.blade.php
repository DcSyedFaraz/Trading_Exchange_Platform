@extends('admin.layout.master')
@section('title', 'Products')
@section('content')
    <div class="productsec">
        <div class="container">
            <h2>Products Pages</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a>
            <div class="row align-items-center my-2">
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
                                <a href="{{ route('products.chat', $product->id) }}" class="cn">Chat Now</a>
                                <i class="fa-light fa-plus dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                  </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
